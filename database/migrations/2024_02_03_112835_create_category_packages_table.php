<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoryPackagesTable extends Migration {
    public function up() {
        Schema::create('category_package', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id');
            $table->foreignId('package_id');
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('category_package');
    }
}
