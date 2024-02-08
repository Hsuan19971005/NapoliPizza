<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCityDistrictsTable extends Migration {
    public function up() {
        Schema::create('city_districts', function (Blueprint $table) {
            $table->id();
            $table->string('city_name');
            $table->json('district_names');
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('city_districts');
    }
}
