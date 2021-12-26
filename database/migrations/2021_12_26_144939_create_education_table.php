<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEducationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('education', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->text('institute');
            $table->text('level');
            $table->date('start_date');
            $table->date('end_date')->nullable();
            $table->text('icon')->nullable();
            $table->text('description')->nullable();
        });

        Schema::create('subjects', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->bigInteger('education_id')->unsigned();
            $table->text('content');
            //Foreign keys
            $table->foreign('education_id')
                ->references('id')->on('education');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('education');
        Schema::dropIfExists('subjects');
    }
}
