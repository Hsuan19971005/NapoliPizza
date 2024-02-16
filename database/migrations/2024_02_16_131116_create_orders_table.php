<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration {
    public function up() {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('serial_number')->unique();
            $table->string('delivery_time');
            $table->string('customer_name');
            $table->enum('customer_gender', ['Male', 'Female']);
            $table->string('phone');
            $table->decimal('total_price');
            $table->json('items');
            $table->foreignId('store_id');
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('orders');
    }
}
