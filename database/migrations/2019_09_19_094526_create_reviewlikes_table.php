<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReviewlikesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('review_like', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('review_id');
            $table->integer('user_id');
            $table->tinyInteger('like')->unsign()->default(0);
            $table->tinyInteger('unlike')->unsign()->default(0);
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
        Schema::dropIfExists('review_like');
    }
}
