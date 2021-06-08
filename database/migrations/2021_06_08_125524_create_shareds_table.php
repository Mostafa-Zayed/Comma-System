<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSharedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shareds', function (Blueprint $table) {
            $table->id();
            $table->string('name',30)->nullable();
            $table->string('price');
            $table->string('max_hour')->nullable();
            $table->unsignedBigInteger('employee_id')->nullable();
            $table->enum('status',['on','off'])->default('off');
            $table->timestamps();
            $table->softDeletes();

            // RelationShip Mapping
            $table->foreign('employee_id')->references('id')->on('employees')->onUpdate('cascade')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shareds');
    }
}
