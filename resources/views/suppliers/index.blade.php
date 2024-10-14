<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Supplier</title>
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
            margin-bottom: 20px; /* Tambah jarak bawah */
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            background-color: #fff; /* Latar belakang putih untuk tabel */
        }

        th, td {
            padding: 12px;
            text-align: left;
            border: 1px solid #ccc; /* Border untuk sel tabel */
        }

        th {
            background-color: #007bff; /* Warna biru untuk header tabel */
            color: white; /* Warna teks header putih */
        }

        .alert {
            background-color: #dff0d8; /* Warna hijau muda untuk notifikasi */
            color: #3c763d; /* Warna teks notifikasi hijau gelap */
            padding: 10px;
            border: 1px solid #c3e6cb; /* Border notifikasi */
            border-radius: 4px; /* Sudut membulat */
            margin-bottom: 15px; /* Jarak bawah notifikasi */
        }

        .btn {
            background-color: #007bff; /* Warna biru untuk tombol */
            color: white; /* Warna teks tombol putih */
            border: none;
            padding: 10px 15px;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            margin-bottom: 20px; /* Jarak bawah tombol */
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        .btn:hover {
            background-color: #0056b3; /* Warna saat hover tombol */
            transform: translateY(-2px); /* Efek elevasi saat hover */
        }

        .btn-delete {
            background-color: #d9534f; /* Warna merah untuk tombol hapus */
        }

        .btn-delete:hover {
            background-color: #c9302c; /* Warna saat hover tombol hapus */
            transform: translateY(-2px);
        }

        form {
            display: inline-block; /* Menjaga form tetap dalam satu baris */
        }

        /* Desain Responsif */
        @media (max-width: 768px) {
            table {
                font-size: 14px; /* Ukuran font tabel lebih kecil di perangkat kecil */
            }

            th, td {
                padding: 8px; /* Padding yang lebih kecil untuk sel tabel */
            }

            .btn {
                padding: 8px 12px; /* Padding yang lebih kecil untuk tombol */
            }
        }
    </style>
</head>
<body>
    <h1>Daftar Supplier</h1>
    
    @if (session('success'))
        <div class="alert" id="success-alert">
            {{ session('success') }}
        </div>
    @endif

    <!-- Tombol menuju halaman create -->
    <a href="{{ route('suppliers.create') }}" class="btn">Tambah Supplier</a>

    <table>
        <thead>
            <tr>
                <th>Nama Supplier</th>
                <th>Telepon</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($suppliers as $supplier)
                <tr>
                    <td>{{ $supplier->name }}</td>
                    <td>{{ $supplier->phone }}</td>
                    <td>
                        <a href="{{ route('suppliers.edit', $supplier->id) }}" class="btn">Edit</a>
                        <form action="{{ route('suppliers.destroy', $supplier->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-delete" onclick="return confirm('Apakah Anda yakin ingin menghapus?');">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <script>
        // Menghilangkan notifikasi setelah 5 detik
        setTimeout(function() {
            const alert = document.getElementById('success-alert');
            if (alert) {
                alert.style.display = 'none';
            }
        }, 5000); // 5000 ms = 5 detik
    </script>
</body>
</html>
