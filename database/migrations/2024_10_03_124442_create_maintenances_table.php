<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('maintenances', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('vehicle_id'); 
        $table->text('description'); 
        $table->decimal('cost', 8, 2); 
        $table->date('maintenance_date');
        $table->string('status')->default('pending'); 
        $table->timestamps();

        
        $table->foreign('vehicle_id')->references('id')->on('vehicles')->onDelete('cascade');
    });
}

};
