<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->boolean('visible')->default(1);
            $table->integer('category_id')->nullable();
	        $table->integer('author_id')->nullable();
	        $table->integer('views')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->dropColumn('visible');
	        $table->dropColumn('category_id');
	        $table->dropColumn('author_id');
	        $table->dropColumn('views');
        });
    }
}
