<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            //Fields
            $table->text('name');
            $table->string('slug')->unique();
            $table->text('short_desc')->nullable();
            $table->text('long_desc')->nullable();
            $table->text('git_link')->nullable();
            $table->text('web_link')->nullable();
            $table->date('date_made');
            $table->text('img')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projects');
    }
}
