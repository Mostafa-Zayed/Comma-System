<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSessionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sessions', function (Blueprint $table) {
            $table->id();
            $table->dateTime('start');
            $table->dateTime('end')->nullable();
            $table->string('quantity',10)->nullable();
            $table->string('product')->nullable();
            $table->decimal('total')->nullable()->default(0);
            $table->enum('status', ['finished', 'not_start', 'progress'])->default('not_start');
            $table->unsignedBigInteger('employee_id')->nullable();
            $table->unsignedBigInteger('type_id');
            $table->unsignedBigInteger('client_id')->nullable();
            $table->timestamps();
            $table->softDeletes();

            // RelationShip Mapping
            $table->foreign('employee_id')->references('id')->on('employees')->onUpdate('cascade')->onDelete('set null');
            $table->foreign('type_id')->references('id')->on('types')->onUpdate('cascade')->onDelete('no action');
            $table->foreign('client_id')->references('id')->on('clients')->onUpdate('cascade')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sessions');
    }
}
