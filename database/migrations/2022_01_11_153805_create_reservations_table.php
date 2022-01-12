<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('first_name',255);
            $table->string('last_name',255);
            $table->string('address',255);
            $table->string('zipcode');
            $table->string('city');
            $table->string('state');
            $table->string('phone');
            $table->string('email');
            $table->string('login_email');
            $table->date('cindate');
            $table->date('coutdate');
            $table->string('cintime')->nullable();
            $table->string('couttime')->nullable();
            $table->string('childno')->nullable();
            $table->string('adultno')->nullable();
            $table->string('rtype1')->nullable();
            $table->string('rtype2')->nullable();
            $table->string('norooms1')->nullable();
            $table->string('norooms2')->nullable();
            $table->longText('instructions')->nullable();
            $table->decimal('price');
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
        Schema::dropIfExists('reservations');
    }
}
