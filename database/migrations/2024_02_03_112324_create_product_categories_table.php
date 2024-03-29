<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductCategoriesTable extends Migration {
    public function up() {
        Schema::create('product_category', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id');
            $table->foreignId('category_id');
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('product_category');
    }
}
