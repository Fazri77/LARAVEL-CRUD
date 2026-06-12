@extends('layouts.admin')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Import Data Barang</h1>

    @if (session('success'))
        <div class="bg-green-200 p-3 mb-3">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('admin.import.barang') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <!-- FILE -->
        <div class="mb-3">
            <label class="block font-bold">File Excel</label>
            <input type="file" name="file" required>
        </div>

        <!-- SELECTION IMPORT -->
        <div class="mb-3">
            <label class="block font-bold">Opsi Import</label>

            <label>
                <input type="checkbox" name="options[]" value="gambar">
                Gambar
            </label><br>

            <label>
                <input type="checkbox" name="options[]" value="grafik">
                Grafik
            </label>
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2">
            Import
        </button>
    </form>
@endsection
