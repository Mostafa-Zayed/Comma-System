<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->dateTime('start');
            $table->dateTime('end');
            $table->string('time_out')->nullable()->default('0');
            $table->string('time_in')->nullable();
            $table->float('price')->nullable()->default(0.0);
            $table->string('hours')->default('0');
            $table->unsignedBigInteger('client_id');
            $table->unsignedBigInteger('employee_id');
            $table->unsignedBigInteger('member_type_id');
            $table->unsignedBigInteger('type_id')->nullable();
            $table->enum('status',['on','off'])->default('on');
            $table->timestamps();

            // RelationShip Mapping
            $table->foreign('client_id')->references('id')->on('clients');
            $table->foreign('employee_id')->references('id')->on('employees');
            $table->foreign('member_type_id')->references('id')->on('member_types');
            $table->foreign('type_id')->references('id')->on('types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('members');
    }
}
