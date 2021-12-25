<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use League\CommonMark\Extension\Table\Table;

class CreateParkingDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parking_data', function (Blueprint $table) {
            $table->id();
            $table->foreignId('vehicle_id');
            $table->foreign('vehicle_id')->references('id')
            ->on('vehicles')->onDelete('cascade');
            $table->string('unique_code')->unique();
            $table->dateTime('time_in');
            $table->dateTime('time_out')->nullable();
            $table->boolean('is_active');
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
        Schema::dropIfExists('parking_data');
    }
}
