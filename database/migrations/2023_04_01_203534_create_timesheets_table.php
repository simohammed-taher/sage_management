<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTimesheetsTable extends Migration
{
    public function up()
    {
        Schema::create('timesheets', function (Blueprint $table) {
            $table->id();
            $table->string('matricule');
            $table->unsignedBigInteger('task_id');
            $table->date('day');
            $table->boolean('attendance');
            $table->timestamps();

            $table->foreign('matricule')->references('name')->on('employees')->onDelete('cascade');
            $table->foreign('task_id')->references('id')->on('tasks')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('timesheets');
    }
}

