<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBannersCategoryTable extends Migration
{

    public function up()
    {
        Schema::create('banners_category', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string("name");
        });
    }


    public function down()
    {
        Schema::dropIfExists('banners_category');
    }
}
