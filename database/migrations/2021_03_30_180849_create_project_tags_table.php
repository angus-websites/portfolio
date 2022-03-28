<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_tags', function (Blueprint $table) {
            $table->bigInteger('project_id')->unsigned();
            $table->bigInteger('tag_id')->unsigned();
            $table->foreign('project_id')
                ->references('id')->on('projects');
            $table->foreign('tag_id')
                ->references('id')->on('tags');

            $table->unique(array('project_id', 'tag_id'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('project_tags');
    }
}
