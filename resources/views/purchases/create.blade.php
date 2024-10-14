<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Transaksi Pembelian</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Tambah Transaksi Pembelian</h2>
        <form action="{{ route('purchases.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="supplier_id" class="form-label">Supplier:</label>
                <select name="supplier_id" id="supplier_id" class="form-select" required>
                    <option value="" disabled selected>Pilih Supplier</option>
                    @foreach($suppliers as $supplier)
                        <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="item_id" class="form-label">Barang:</label>
                <select name="item_id" id="item_id" class="form-select" required>
                    <option value="" disabled selected>Pilih Barang</option>
                    @foreach($items as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Tambahkan dropdown kategori -->
            <div class="mb-3">
                <label for="category_id" class="form-label">Kategori:</label>
                <select name="category_id" id="category_id" class="form-select" required>
                    <option value="" disabled selected>Pilih Kategori</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="quantity" class="form-label">Jumlah Barang:</label>
                <input type="number" name="quantity" id="quantity" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Harga Satuan:</label>
                <input type="number" name="price" id="price" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="discount" class="form-label">Diskon (%):</label>
                <input type="number" name="discount" id="discount" class="form-control" placeholder="Masukkan diskon jika ada">
            </div>

            <div class="mb-3">
                <label for="payment_method" class="form-label">Metode Pembayaran:</label>
                <select name="payment_method" id="payment_method" class="form-select" required>
                    <option value="" disabled selected>Pilih Metode Pembayaran</option>
                    <option value="Cash">Cash</option>
                    <option value="Transfer">Transfer</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="date" class="form-label">Tanggal:</label>
                <input type="date" name="date" id="date" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary w-100">Simpan</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
