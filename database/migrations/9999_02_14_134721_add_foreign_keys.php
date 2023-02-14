<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {

            // 2) Vado a creare una foreignkey alla tabella "pruducts"
            $table->foreignId('typology_id')
                ->constrained();
        });

        Schema::table('category_product', function (Blueprint $table) {

            // 2) Vado a creare una foreignkey alla tabella ponte "category_product"
            $table->foreignId('category_id')
                ->constrained();
            $table->foreignId('product_id')
                ->constrained();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            // 3) dalla struttura della tabella "products" prendo la chiave "products_typology_id_foreign"
            // Vado ad eliminare la relazione.
            $table->dropForeign('products_typology_id_foreign');
        });
        Schema::table('category_product', function (Blueprint $table) {
            // 3) dalla struttura della tabella "category_product" prendo la chiave "category_product_category_id_foreign"
            // Vado ad eliminare le relazioni per entrambe le tabelle.
            $table->dropForeign('category_product_category_id_foreign');
            $table->dropForeign('category_product_product_id_foreign');
        });
    }
};