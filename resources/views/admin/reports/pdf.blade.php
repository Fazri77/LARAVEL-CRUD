<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Laporan Transaksi</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 10px;
            color: #1e293b;
            line-height: 1.4;
        }

        /* ── Header ── */
        .report-header {
            border-bottom: 3px solid #1e293b;
            padding-bottom: 15px;
            margin-bottom: 20px;
        }

        .report-header table {
            width: 100%;
        }

        .company-name {
            font-size: 22px;
            font-weight: bold;
            color: #1e293b;
            letter-spacing: 2px;
        }

        .company-sub {
            font-size: 9px;
            color: #64748b;
            margin-top: 2px;
        }

        .report-title {
            text-align: right;
        }

        .report-title h2 {
            font-size: 16px;
            color: #1e293b;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .report-title .period {
            font-size: 9px;
            color: #64748b;
            margin-top: 4px;
        }

        .report-title .generated {
            font-size: 8px;
            color: #94a3b8;
            margin-top: 2px;
        }

        /* ── Summary Cards ── */
        .summary-section {
            margin-bottom: 20px;
        }

        .summary-section h3 {
            font-size: 10px;
            text-transform: uppercase;
            letter-spacing: 2px;
            color: #64748b;
            margin-bottom: 10px;
        }

        .summary-cards {
            width: 100%;
            border-collapse: collapse;
        }

        .summary-cards td {
            width: 25%;
            padding: 10px 12px;
            border: 1px solid #e2e8f0;
            vertical-align: top;
        }

        .summary-cards .card-label {
            font-size: 8px;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: #64748b;
            margin-bottom: 4px;
        }

        .summary-cards .card-value {
            font-size: 16px;
            font-weight: bold;
            color: #1e293b;
        }

        .summary-cards .card-value.revenue {
            color: #059669;
        }

        .summary-cards td.dark {
            background-color: #1e293b;
        }

        .summary-cards td.dark .card-label {
            color: #94a3b8;
        }

        .summary-cards td.dark .card-value {
            color: #ffffff;
        }

        /* ── Data Table ── */
        .data-section {
            margin-bottom: 20px;
        }

        .data-section h3 {
            font-size: 10px;
            text-transform: uppercase;
            letter-spacing: 2px;
            color: #64748b;
            margin-bottom: 10px;
        }

        .data-table {
            width: 100%;
            border-collapse: collapse;
            font-size: 9px;
        }

        .data-table thead th {
            background-color: #1e293b;
            color: #ffffff;
            padding: 8px 6px;
            text-align: left;
            font-size: 8px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            font-weight: bold;
        }

        .data-table thead th:first-child {
            text-align: center;
            width: 30px;
        }

        .data-table tbody td {
            padding: 7px 6px;
            border-bottom: 1px solid #e2e8f0;
        }

        .data-table tbody tr:nth-child(even) {
            background-color: #f8fafc;
        }

        .data-table .text-center {
            text-align: center;
        }

        .data-table .text-right {
            text-align: right;
        }

        .badge {
            display: inline-block;
            padding: 2px 8px;
            font-size: 8px;
            font-weight: bold;
            letter-spacing: 0.5px;
            text-transform: uppercase;
        }

        .badge-pending {
            background-color: #fef3c7;
            color: #92400e;
            border: 1px solid #f59e0b;
        }

        .badge-completed {
            background-color: #d1fae5;
            color: #065f46;
            border: 1px solid #10b981;
        }

        .badge-default {
            background-color: #e2e8f0;
            color: #475569;
            border: 1px solid #94a3b8;
        }

        /* ── Bottom Stats ── */
        .bottom-stats {
            margin-top: 5px;
        }

        .bottom-stats table {
            width: 100%;
            border-collapse: collapse;
        }

        .bottom-stats td {
            width: 50%;
            vertical-align: top;
            padding-right: 15px;
        }

        .bottom-stats td:last-child {
            padding-right: 0;
            padding-left: 15px;
        }

        .stat-box {
            border: 1px solid #e2e8f0;
            padding: 12px;
            margin-bottom: 8px;
        }

        .stat-box h4 {
            font-size: 9px;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            color: #64748b;
            margin-bottom: 8px;
            border-bottom: 1px solid #e2e8f0;
            padding-bottom: 6px;
        }

        .stat-row {
            display: block;
            padding: 4px 0;
            border-bottom: 1px dotted #e2e8f0;
            overflow: hidden;
        }

        .stat-row:last-child {
            border-bottom: none;
        }

        .stat-label {
            float: left;
            color: #475569;
            font-size: 9px;
        }

        .stat-value {
            float: right;
            font-weight: bold;
            color: #1e293b;
            font-size: 9px;
        }

        /* ── Footer ── */
        .report-footer {
            margin-top: 25px;
            padding-top: 10px;
            border-top: 2px solid #1e293b;
            text-align: center;
            font-size: 8px;
            color: #94a3b8;
        }

        .no-data {
            text-align: center;
            padding: 40px 20px;
            color: #94a3b8;
            font-size: 12px;
            border: 2px dashed #e2e8f0;
        }

        .page-break {
            page-break-before: always;
        }
    </style>
</head>

<body>
    {{-- ── HEADER ── --}}
    <div class="report-header">
        <table>
            <tr>
                <td>
                    <div class="company-name">FIGUREVAULT</div>
                    <div class="company-sub">Sistem Manajemen Koleksi & Transaksi</div>
                </td>
                <td class="report-title">
                    <h2>Laporan Transaksi</h2>
                    <div class="period">Periode: {{ \Carbon\Carbon::parse($mulai)->format('d M Y') }} — {{ \Carbon\Carbon::parse($akhir)->format('d M Y') }}</div>
                    <div class="generated">Digenerate: {{ \Carbon\Carbon::now()->format('d M Y, H:i') }} WIB</div>
                </td>
            </tr>
        </table>
    </div>

    {{-- ── SUMMARY CARDS ── --}}
    <div class="summary-section">
        <h3>Ringkasan</h3>
        <table class="summary-cards">
            <tr>
                <td class="dark">
                    <div class="card-label">Total Transaksi</div>
                    <div class="card-value">{{ $summary->total_transaksi }}</div>
                </td>
                <td>
                    <div class="card-label">Total Revenue</div>
                    <div class="card-value revenue">Rp {{ number_format($summary->total_revenue, 0, ',', '.') }}</div>
                </td>
                <td>
                    <div class="card-label">Item Terjual</div>
                    <div class="card-value">{{ $summary->total_items }}</div>
                </td>
                <td>
                    <div class="card-label">Transaksi Pending</div>
                    <div class="card-value">{{ $summary->total_pending }}</div>
                </td>
            </tr>
        </table>
    </div>

    {{-- ── TRANSACTION TABLE ── --}}
    <div class="data-section">
        <h3>Detail Transaksi</h3>

        @if($transactions->count() > 0)
            <table class="data-table">
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th>Invoice</th>
                        <th>Tanggal</th>
                        <th>Email Pembeli</th>
                        <th>Nama Barang</th>
                        <th class="text-right">Harga</th>
                        <th class="text-center">Qty</th>
                        <th class="text-right">Total</th>
                        <th class="text-center">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($transactions as $index => $trx)
                        <tr>
                            <td class="text-center">{{ $index + 1 }}</td>
                            <td><strong>{{ $trx->invoice }}</strong></td>
                            <td>{{ $trx->created_at->format('d/m/Y H:i') }}</td>
                            <td>{{ $trx->user_email }}</td>
                            <td>{{ $trx->barang_name }}</td>
                            <td class="text-right">Rp {{ number_format($trx->harga, 0, ',', '.') }}</td>
                            <td class="text-center">{{ $trx->qty }}</td>
                            <td class="text-right"><strong>Rp {{ number_format($trx->total, 0, ',', '.') }}</strong></td>
                            <td class="text-center">
                                @if($trx->status === 'Pending')
                                    <span class="badge badge-pending">{{ $trx->status }}</span>
                                @elseif($trx->status === 'Completed')
                                    <span class="badge badge-completed">{{ $trx->status }}</span>
                                @else
                                    <span class="badge badge-default">{{ $trx->status }}</span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <div class="no-data">
                Tidak ada data transaksi pada periode ini.
            </div>
        @endif
    </div>

    {{-- ── BOTTOM STATS (Side by side) ── --}}
    @if($transactions->count() > 0)
    <div class="bottom-stats">
        <table>
            <tr>
                <td>
                    {{-- Status Breakdown --}}
                    <div class="stat-box">
                        <h4>Breakdown Status</h4>
                        @foreach($statusBreakdown as $status => $count)
                            <div class="stat-row">
                                <span class="stat-label">{{ $status }}</span>
                                <span class="stat-value">{{ $count }} transaksi</span>
                            </div>
                        @endforeach
                    </div>

                    {{-- Options used --}}
                    @if(count($opsi) > 0)
                    <div class="stat-box">
                        <h4>Opsi Laporan</h4>
                        @foreach($opsi as $item)
                            <div class="stat-row">
                                <span class="stat-label">✓ {{ ucfirst($item) }}</span>
                            </div>
                        @endforeach
                    </div>
                    @endif
                </td>
                <td>
                    {{-- Top Selling Items --}}
                    <div class="stat-box">
                        <h4>Top {{ $topItems->count() }} Produk Terlaris</h4>
                        @foreach($topItems as $item)
                            <div class="stat-row">
                                <span class="stat-label">{{ $item->name }}</span>
                                <span class="stat-value">{{ $item->qty_sold }} pcs — Rp {{ number_format($item->revenue, 0, ',', '.') }}</span>
                            </div>
                        @endforeach
                    </div>
                </td>
            </tr>
        </table>
    </div>
    @endif

    {{-- ── FOOTER ── --}}
    <div class="report-footer">
        FigureVault &bull; Laporan ini digenerate secara otomatis oleh sistem &bull; {{ \Carbon\Carbon::now()->format('d M Y H:i') }}
    </div>
</body>

</html>
