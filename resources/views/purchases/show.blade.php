<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Transaksi Pembelian</title>
    <style>
        .container {
            width: 50%;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        h1 {
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Detail Transaksi Pembelian</h1>

        <p><strong>Tanggal dan Waktu:</strong> {{ $purchase->date }}</p>
        <p><strong>Nama Supplier:</strong> {{ $purchase->supplier->name }}</p>
        <p><strong>Metode Pembayaran:</strong> {{ $purchase->payment_method }}</p>
        <p><strong>Nama Barang:</strong> {{ $purchase->item->name }}</p>
        <p><strong>Jumlah Barang:</strong> {{ $purchase->amount }}</p>
        <p><strong>Harga Satuan:</strong> {{ number_format($purchase->unit_price, 2) }}</p>
        <p><strong>Total Pembayaran:</strong> {{ number_format($purchase->total_payment, 2) }}</p>
        <p><strong>Status Transaksi:</strong> {{ $purchase->status }}</p>

        <a href="{{ route('purchases.index') }}">Kembali ke Daftar Transaksi</a>
    </div>
</body>
</html>
