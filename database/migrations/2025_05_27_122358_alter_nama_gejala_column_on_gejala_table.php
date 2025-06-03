<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterNamaGejalaColumnOnGejalaTable extends Migration
{
    public function up()
    {
        Schema::table('gejala', function (Blueprint $table) {
            $table->text('nama_gejala')->change();
        });
    }

    public function down()
    {
        Schema::table('gejala', function (Blueprint $table) {
            $table->string('nama_gejala', 255)->change();
        });
    }
}

