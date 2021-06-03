<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('firstname',50)->nullable();
            $table->string('lastname',50)->nullable();
            $table->string('email',100)->unique();
            $table->unsignedBigInteger('ssn')->unique();
            $table->string('password',100);
            $table->boolean('type')->default(0);
            $table->enum('active',['active','not active'])->default('not active');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
}
