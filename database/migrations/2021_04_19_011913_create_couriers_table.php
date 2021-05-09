<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCouriersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('couriers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('receiver_id');
            $table->foreignId('shipper_id');
            $table->string('tracking_code')->unique();
            $table->foreignId('booking_officer')->nullable();
            $table->foreignId('booking_office');
            $table->foreignId('destination');
            $table->string('shipping_address');
            $table->double('weight')->default('1');
            $table->double('unit')->default('1');
            $table->string('delivery')->default('regular');
            $table->string('category');
            $table->double('total');
            $table->longText('description')->nullable();
            $table->text('status')->default('pending');
            $table->foreignId('payment_id')->nullable();
            $table->timestamps();


            $table->foreign('receiver_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
            $table->foreign('shipper_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
            $table->foreign('booking_office')
                ->references('id')
                ->on('branches')
                ->onDelete('cascade');
            $table->foreign('booking_officer')
                ->references('id')
                ->on('employees')
                ->onDelete('cascade');
            $table->foreign('destination')
                ->references('id')
                ->on('branches')
                ->onDelete('cascade');
            $table->foreign('payment_id')
                ->references('id')
                ->on('payments')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('couriers');
    }
}
