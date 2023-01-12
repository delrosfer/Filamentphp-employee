<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id()->startingValue(5000);
            $table->foreignId('country_id')->constrained()->cascadeOndelete();
            $table->foreignId('state_id')->constrained()->cascadeOndelete();
            $table->foreignId('city_id')->constrained()->cascadeOndelete();
            $table->foreignId('department_id')->constrained()->cascadeOndelete();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('address');
            $table->string('phone_number');
            $table->char('zip_code');
            $table->date('birth_date');
            $table->date('date_hired');
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
        Schema::dropIfExists('employees');
    }
};
