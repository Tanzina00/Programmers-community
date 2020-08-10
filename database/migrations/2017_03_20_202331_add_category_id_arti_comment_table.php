<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCategoryIdArtiCommentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('comments', function (Blueprint $table) {
            $table->dropForeign('comments_category_id_foreign');
            $table->dropColumn('category_id');
        });
    }

    public function down()
    {
        Schema::table('comments', function (Blueprint $table) {
            //
        });
    }
}
