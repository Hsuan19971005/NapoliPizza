    <?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddImgUrlToProductsTable extends Migration {
    public function up() {
        Schema::table('products', function (Blueprint $table) {
            $table->string('img_url')->nullable();
        });
    }

    public function down() {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('img_url');
        });
    }
}
