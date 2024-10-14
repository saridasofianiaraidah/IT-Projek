<!-- resources/views/suppliers/create.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Supplier</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 500px;
            margin: 0 auto;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #333;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .btn-group {
            display: flex;
            justify-content: space-between; /* Membuat tombol sejajar dengan jarak antar tombol */
            gap: 10px; /* Memberi jarak antara kedua tombol */
            margin-top: 10px;
        }

        .btn {
            flex: 1; /* Membuat tombol memiliki ukuran yang sama */
            padding: 10px;
            background-color: #5cb85c;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            text-align: center; /* Menyelaraskan teks secara horizontal */
        }

        .btn-back {
            background-color: #d9534f;
            display: flex; /* Gunakan flexbox untuk menyelaraskan konten */
            justify-content: center; /* Pusatkan teks secara horizontal */
            align-items: center; /* Pusatkan teks secara vertikal */
        }

        .btn:hover {
            opacity: 0.9;
        }

        .alert {
            background-color: #f8d7da;
            color: #721c24;
            padding: 10px;
            border: 1px solid #f5c6cb;
            border-radius: 4px;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Create Supplier</h1>
        
        @if ($errors->any())
            <div class="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        
        <form action="{{ route('suppliers.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" required>
            </div>
            <div class="form-group">
                <label for="phone">Phone:</label>
                <input type="text" name="phone" id="phone" required>
            </div>

            <!-- Membuat kedua tombol sejajar -->
            <div class="btn-group">
                <button type="submit" class="btn">Simpan</button>
                <a href="{{ route('suppliers.index') }}" class="btn btn-back">Kembali</a>
            </div>
        </form>
    </div>
</body>
</html>
