<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buat Transaksi Pembelian</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }

        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        form {
            background-color: white;
            padding: 20px;
            border-radius: 5px;
            max-width: 600px;
            margin: 0 auto;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #333;
        }

        input[type="text"],
        input[type="number"],
        input[type="date"],
        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        .btn-submit {
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .btn-submit:hover {
            background-color: #0056b3;
        }

        .alert {
            background-color: #f2dede;
            color: #a94442;
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 4px;
        }
    </style>
</head>
<body>

    <h1>Buat Transaksi Pembelian</h1>

    <!-- Tampilkan pesan error jika ada -->
    @if ($errors->any())
        <div class="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('purchases.store') }}" method="POST">
        @csrf

        <label for="supplier">Supplier</label>
        <select name="supplier_id" id="supplier" required>
            <option value="" disabled selected>Pilih Supplier</option>
            @foreach($suppliers as $supplier)
                <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
            @endforeach
        </select>

        <label for="item">Nama Barang</label>
        <select name="item_id" id="item" required>
            <option value="" disabled selected>Pilih Barang</option>
            @foreach($items as $item)
                <option value="{{ $item->id }}">{{ $item->name }}</option>
            @endforeach
        </select>

        <label for="category">Kategori</label>
        <select name="category_id" id="category" required>
            <option value="" disabled selected>Pilih Kategori</option>
            @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>

        <label for="quantity">Jumlah</label>
        <input type="number" name="quantity" id="quantity" min="1" required>

        <label for="price">Harga Satuan</label>
        <input type="number" name="price" id="price" min="0" step="0.01" required>

        <label for="discount">Diskon (%)</label>
        <input type="number" name="discount" id="discount" min="0" max="100" step="0.01" required>

        <label for="date">Tanggal Transaksi</label>
        <input type="date" name="date" id="date" required>

        <label for="payment_method">Metode Pembayaran</label>
        <select name="payment_method" id="payment_method" required>
            <option value="" disabled selected>Pilih Metode Pembayaran</option>
            <option value="cash">Cash</option>
            <option value="transfer">Transfer</option>
            <option value="credit">Kredit</option>
        </select>

        <button type="submit" class="btn-submit">Simpan Transaksi</button>
    </form>

</body>
</html>
