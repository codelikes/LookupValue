<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLookupValueTable extends Migration
{
    public function up()
    {
        Schema::create('lookups', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->unique();
            $table->timestamps();
        });

        Schema::create('lookup_values', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('lookup_id');
            $table->string('key')->unique();
            $table->longText('value');
            $table->timestamps();

            $table->foreign('lookup_id')
                ->references('id')
                ->on('lookups')
                ->onDelete('cascade');
        });

    }

    public function down()
    {
        Schema::drop('lookups');
    }
}
