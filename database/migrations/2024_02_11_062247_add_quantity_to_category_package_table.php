<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddQuantityToCategoryPackageTable extends Migration {
    public function up() {
        Schema::table('category_package', function (Blueprint $table) {
            $table->integer('quantity');
        });
    }

    public function down() {
        Schema::table('category_package', function (Blueprint $table) {
            $table->dropColumn('quantity');
        });
    }
}
