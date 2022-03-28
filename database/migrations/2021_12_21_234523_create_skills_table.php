<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSkillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('skills', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->text('name');
            $table->bigInteger('skill_section_id')->unsigned();
            $table->text('description')->nullable();
            $table->text('icon')->nullable();

            //Foreign keys
            $table->foreign('skill_section_id')
                ->references('id')->on('skill_sections')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('skills');
    }
}
