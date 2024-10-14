namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;

    protected $fillable = [
        'supplier_id', 
        'item_id', 
        'category_id', // Tambahkan jika ada kolom kategori
        'quantity', 
        'price', 
        'discount', 
        'payment_method', 
        'date'
    ];

    // Menghitung harga total setelah diskon
    public function totalPrice()
    {
        $discountedPrice = $this->price - ($this->price * ($this->discount / 100));
        return $this->quantity * $discountedPrice;
    }

    // Relasi ke Supplier
    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

    // Relasi ke Item (Barang)
    public function item()
    {
        return $this->belongsTo(Item::class);
    }

    // Relasi ke Kategori (opsional, tergantung pada struktur database)
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
