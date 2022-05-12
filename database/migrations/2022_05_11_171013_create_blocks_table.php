<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blocks', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            //Fields
            $table->text('path');
            $table->text('name');
        });

        Schema::create('block_project', function (Blueprint $table) {
            $table->biginteger('block_id')->unsigned()->index();
            $table->foreign('block_id')->references('id')->on('blocks')->onDelete('cascade');
            $table->biginteger('project_id')->unsigned()->index();
            $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');
            $table->integer('order')->default(0);
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
        Schema::dropIfExists('block_project');
        Schema::dropIfExists('blocks');
    }
};
