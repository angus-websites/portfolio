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
            $table->boolean('active')->default(0);
            $table->foreignId('category_id')->constrained("categories")
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->text('short_desc')->nullable();
            $table->text('long_desc')->nullable();
            $table->text('git_link')->nullable();
            $table->text('web_link')->nullable();
            $table->date('date_made')->nullable();
            $table->text('img')->nullable();
            $table->text('logo')->nullable();
            $table->text('cover')->nullable();

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
