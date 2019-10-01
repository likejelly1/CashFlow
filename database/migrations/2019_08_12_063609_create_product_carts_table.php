<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_carts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('code');
            $table->string('satuan');
            $table->bigInteger('project_id');
            $table->bigInteger('product_id');
            $table->bigInteger('qty');
            $table->decimal('price_list_satuan', 13, 2);
            $table->decimal('price_list_total', 13, 2);
            $table->decimal('discount_pl')->default(0);
            $table->decimal('grossup_pl')->default(0);
            $table->decimal('harga_satuan_modal', 13, 2);
            $table->decimal('harga_total_modal', 13, 2);
            $table->decimal('discount_jual')->default(0);
            $table->decimal('grossup_jual')->default(0);
            $table->decimal('harga_satuan_jual', 13, 2);
            $table->decimal('harga_total_jual', 13, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_carts');
    }
}
