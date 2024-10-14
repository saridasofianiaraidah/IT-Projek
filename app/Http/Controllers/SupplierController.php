<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function edit(Supplier $supplier)
    {
        return view('suppliers.edit', compact('supplier'));
    }
    
    // Mengupdate data supplier
    public function update(Request $request, Supplier $supplier)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
        ]);
    
        $supplier->update($request->all());
    
        return redirect()->route('suppliers.index')->with('success', 'Supplier berhasil diperbarui.');
    }

    // SupplierController.php
public function destroy(Supplier $supplier)
{
    $supplier->delete();

    return redirect()->route('suppliers.index')->with('success', 'Supplier berhasil dihapus.');
}

    // Method untuk menampilkan daftar supplier
    public function index()
    {
        $suppliers = Supplier::all();
        return view('suppliers.index', compact('suppliers'));
    }

    // Method untuk menampilkan form pembuatan supplier
    public function create()
    {
        return view('suppliers.create');
    }

    // Method untuk menyimpan supplier baru
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
        ]);

        Supplier::create($request->all());

        return redirect()->route('suppliers.index')->with('success', 'supplier baru telah ditambah.');
    }

    // Method lainnya (edit, update, destroy) dapat kamu tambahkan di sini sesuai kebutuhan
}
