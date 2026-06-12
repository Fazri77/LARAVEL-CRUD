<?php

namespace App\Exports;

use App\Models\Transaction;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

class LaporanExport implements FromCollection, WithHeadings, WithMapping, WithStyles, WithColumnWidths, WithTitle, WithEvents
{
    protected $mulai;
    protected $akhir;
    protected $transactions;

    public function __construct(string $mulai, string $akhir)
    {
        $this->mulai = $mulai;
        $this->akhir = $akhir;
    }

    public function collection()
    {
        $this->transactions = Transaction::whereBetween('created_at', [
            $this->mulai . ' 00:00:00',
            $this->akhir . ' 23:59:59',
        ])->orderBy('created_at', 'desc')->get();

        return $this->transactions;
    }

    public function headings(): array
    {
        return [
            'No',
            'Invoice',
            'Tanggal',
            'Email Pembeli',
            'Nama Barang',
            'Harga Satuan',
            'Qty',
            'Total',
            'Metode Pembayaran',
            'Status',
        ];
    }

    public function map($transaction): array
    {
        static $no = 0;
        $no++;

        return [
            $no,
            $transaction->invoice,
            $transaction->created_at->format('d/m/Y H:i'),
            $transaction->user_email,
            $transaction->barang_name,
            $transaction->harga,
            $transaction->qty,
            $transaction->total,
            $transaction->payment_method,
            $transaction->status,
        ];
    }

    public function columnWidths(): array
    {
        return [
            'A' => 6,
            'B' => 22,
            'C' => 20,
            'D' => 28,
            'E' => 28,
            'F' => 18,
            'G' => 8,
            'H' => 18,
            'I' => 22,
            'J' => 14,
        ];
    }

    public function styles(Worksheet $sheet): array
    {
        return [
            1 => [
                'font' => [
                    'bold' => true,
                    'color' => ['rgb' => 'FFFFFF'],
                    'size' => 11,
                ],
                'fill' => [
                    'fillType' => Fill::FILL_SOLID,
                    'startColor' => ['rgb' => '1E293B'],
                ],
                'alignment' => [
                    'horizontal' => Alignment::HORIZONTAL_CENTER,
                    'vertical' => Alignment::VERTICAL_CENTER,
                ],
            ],
        ];
    }

    public function title(): string
    {
        return 'Laporan Transaksi';
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $sheet = $event->sheet->getDelegate();
                $rowCount = $this->transactions ? $this->transactions->count() : 0;
                $lastDataRow = $rowCount + 1; // +1 for header

                // Apply borders to all data cells
                if ($rowCount > 0) {
                    $dataRange = 'A1:J' . $lastDataRow;
                    $sheet->getStyle($dataRange)->applyFromArray([
                        'borders' => [
                            'allBorders' => [
                                'borderStyle' => Border::BORDER_THIN,
                                'color' => ['rgb' => 'D1D5DB'],
                            ],
                        ],
                        'alignment' => [
                            'vertical' => Alignment::VERTICAL_CENTER,
                        ],
                    ]);

                    // Center align No, Qty columns
                    $sheet->getStyle('A2:A' . $lastDataRow)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
                    $sheet->getStyle('G2:G' . $lastDataRow)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

                    // Number format for currency columns (Harga & Total)
                    $sheet->getStyle('F2:F' . $lastDataRow)->getNumberFormat()->setFormatCode('#,##0');
                    $sheet->getStyle('H2:H' . $lastDataRow)->getNumberFormat()->setFormatCode('#,##0');

                    // Alternating row colors
                    for ($i = 2; $i <= $lastDataRow; $i++) {
                        if ($i % 2 === 0) {
                            $sheet->getStyle('A' . $i . ':J' . $i)->applyFromArray([
                                'fill' => [
                                    'fillType' => Fill::FILL_SOLID,
                                    'startColor' => ['rgb' => 'F8FAFC'],
                                ],
                            ]);
                        }
                    }

                    // Status column coloring
                    for ($i = 2; $i <= $lastDataRow; $i++) {
                        $statusValue = $sheet->getCell('J' . $i)->getValue();
                        $color = $statusValue === 'Pending' ? 'FEF3C7' : 'D1FAE5';
                        $fontColor = $statusValue === 'Pending' ? '92400E' : '065F46';
                        $sheet->getStyle('J' . $i)->applyFromArray([
                            'fill' => [
                                'fillType' => Fill::FILL_SOLID,
                                'startColor' => ['rgb' => $color],
                            ],
                            'font' => [
                                'bold' => true,
                                'color' => ['rgb' => $fontColor],
                            ],
                            'alignment' => [
                                'horizontal' => Alignment::HORIZONTAL_CENTER,
                            ],
                        ]);
                    }
                }

                // Summary row
                $summaryRow = $lastDataRow + 2;
                $sheet->setCellValue('A' . $summaryRow, 'RINGKASAN LAPORAN');
                $sheet->mergeCells('A' . $summaryRow . ':C' . $summaryRow);
                $sheet->getStyle('A' . $summaryRow)->applyFromArray([
                    'font' => ['bold' => true, 'size' => 12, 'color' => ['rgb' => '1E293B']],
                ]);

                $sheet->setCellValue('A' . ($summaryRow + 1), 'Periode:');
                $sheet->setCellValue('B' . ($summaryRow + 1), $this->mulai . ' s/d ' . $this->akhir);
                $sheet->getStyle('A' . ($summaryRow + 1))->getFont()->setBold(true);

                $sheet->setCellValue('A' . ($summaryRow + 2), 'Total Transaksi:');
                $sheet->setCellValue('B' . ($summaryRow + 2), $rowCount);
                $sheet->getStyle('A' . ($summaryRow + 2))->getFont()->setBold(true);

                if ($rowCount > 0) {
                    $totalRevenue = $this->transactions->sum('total');
                    $totalItems = $this->transactions->sum('qty');

                    $sheet->setCellValue('A' . ($summaryRow + 3), 'Total Item Terjual:');
                    $sheet->setCellValue('B' . ($summaryRow + 3), $totalItems);
                    $sheet->getStyle('A' . ($summaryRow + 3))->getFont()->setBold(true);

                    $sheet->setCellValue('A' . ($summaryRow + 4), 'Total Revenue:');
                    $sheet->setCellValue('B' . ($summaryRow + 4), 'Rp ' . number_format($totalRevenue, 0, ',', '.'));
                    $sheet->getStyle('A' . ($summaryRow + 4))->getFont()->setBold(true);
                    $sheet->getStyle('B' . ($summaryRow + 4))->getFont()->setBold(true);
                    $sheet->getStyle('B' . ($summaryRow + 4))->getFont()->setSize(12);
                }

                // Header row height
                $sheet->getRowDimension(1)->setRowHeight(30);

                // Freeze the header row
                $sheet->freezePane('A2');
            },
        ];
    }
}
