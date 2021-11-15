<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehiclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->decimal('price', 12, 2);
            $table->foreignId('fuel_type_id')->constrained();
            $table->foreignId('brand_id')->constrained();
            $table->foreignId('class_group_id')->constrained();
            $table->foreignId('gear_type_id')->constrained();
            $table->smallInteger('driver_licence_age');
            $table->smallInteger('vote')->comment('1-10');
            $table->integer('kilometer');
            $table->decimal('deposit', 12, 2);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vehicles');
    }
}
