<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLabelTaskTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('label_task', function (Blueprint $table) {
            $table->integer('task_id')->unsigned();
            $table->integer('label_id')->unsigned();
    
            $table->unique(['task_id', 'label_id']);
            $table->foreign('task_id')->references('id')->on('tasks')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('label_id')->references('id')->on('labels')
                ->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('label_task');
    }
}
