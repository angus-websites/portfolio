<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmploymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employments', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->text('employer');
            $table->date('start_date');
            $table->date('end_date')->nullable();
            $table->text('icon')->nullable();
            $table->text('description')->nullable();
        });

        Schema::create('responsibilities', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->bigInteger('employment_id')->unsigned();
            $table->text('content');
            //Foreign keys
            $table->foreign('employment_id')
                ->references('id')->on('employments');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employments');
        Schema::dropIfExists('responsibilities');
    }
}
