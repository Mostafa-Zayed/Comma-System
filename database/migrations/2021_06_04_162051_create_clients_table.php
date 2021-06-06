<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('name',70);
            $table->string('email',100)->unique()->nullable();
            $table->string('ssn')->unique();
            $table->string('phone',25)->nullable();
            $table->string('job',255)->nullable();
            $table->enum('status',['on','off'])->default('on');
            $table->foreignId('employee_id')->nullable();
            $table->timestamps();
            $table->softDeletes();

            // RelationShip Mapping
            $table->foreign('employee_id')->references('id')->on('employees')->onDelete('set null')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clients');
    }
}
