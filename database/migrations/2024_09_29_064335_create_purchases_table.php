<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchases', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('supplier_id');
            $table->unsignedBigInteger('item_id'); // Menambahkan relasi ke tabel items (barang)
            $table->integer('quantity'); // Jumlah barang
            $table->decimal('price', 10, 2); // Harga satuan
            $table->decimal('discount', 5, 2)->default(0); // Diskon dalam persen
            $table->decimal('total_payment', 15, 2); // Total Pembayaran
            $table->string('payment_method'); // Metode Pembayaran
            $table->string('transaction_status')->default('pending'); // Status transaksi
            $table->date('date'); // Tanggal pembelian
            $table->timestamps();

            // Relasi ke tabel suppliers dan items
            $table->foreign('supplier_id')->references('id')->on('suppliers')->onDelete('cascade');
            $table->foreign('item_id')->references('id')->on('items')->onDelete('cascade'); // Relasi ke barang
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('purchases');
    }
}
