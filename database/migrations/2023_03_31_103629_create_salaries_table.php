<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalariesTable extends Migration
{
    public function up()
    {
        Schema::create('salaries', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('employee_id');
            $table->foreign('employee_id')->references('id')->on('employees')->onDelete('cascade');
            $table->decimal('amount', 10, 2);
            $table->date('pay_date')->default(now()); // Set a default value
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('salaries');
    }
}
