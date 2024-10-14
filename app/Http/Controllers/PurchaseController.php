namespace App\Http\Controllers;

use App\Models\Purchase;
use App\Models\Supplier;
use App\Models\Item;
use App\Models\Category; // Tambahkan model Category
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    public function index()
    {
        // Mengambil semua transaksi pembelian beserta relasi supplier, item, dan kategori
        $purchases = Purchase::with(['supplier', 'item', 'category'])->get();
        return view('purchases.index', compact('purchases'));
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'supplier_id' => 'required|exists:suppliers,id',
            'item_id' => 'required|exists:items,id',
            'category_id' => 'required|exists:categories,id', // Tambah validasi kategori
            'quantity' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
            'discount' => 'nullable|numeric|min:0|max:100',
            'payment_method' => 'required|string',
            'transaction_status' => 'required|string',
            'date' => 'required|date',
        ]);

        // Simpan transaksi pembelian baru dan hitung total harga menggunakan metode di model
        $purchase = new Purchase($request->all());
        $purchase->total_payment = $purchase->totalPrice(); // Menggunakan metode dari model
        $purchase->save();

        return redirect()->route('purchases.index')->with('success', 'Transaksi pembelian berhasil ditambahkan.');
    }

    public function update(Request $request, Purchase $purchase)
    {
        // Validasi input
        $request->validate([
            'supplier_id' => 'required|exists:suppliers,id',
            'item_id' => 'required|exists:items,id',
            'category_id' => 'required|exists:categories,id', // Tambah validasi kategori
            'quantity' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
            'discount' => 'nullable|numeric|min:0|max:100',
            'payment_method' => 'required|string',
            'transaction_status' => 'required|string',
            'date' => 'required|date',
        ]);

        // Update transaksi pembelian dan hitung total harga menggunakan metode di model
        $purchase->update($request->all());
        $purchase->total_payment = $purchase->totalPrice(); // Menggunakan metode dari model
        $purchase->save();

        return redirect()->route('purchases.index')->with('success', 'Transaksi pembelian berhasil diperbarui.');
    }

    public function destroy(Purchase $purchase)
    {
        // Hapus transaksi pembelian
        $purchase->delete();

        return redirect()->route('purchases.index')->with('success', 'Transaksi pembelian berhasil dihapus.');
    }
}
