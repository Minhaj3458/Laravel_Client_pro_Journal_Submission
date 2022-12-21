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
        Schema::create('reviewer_information', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('name',250)->nullable();
            $table->string('student_id',250)->nullable();
            $table->string('department',250)->nullable();
            $table->string('Batch',250)->nullable();
            $table->string('address',250)->nullable();
            $table->string('number',15)->nullable();
            $table->string('image')->nullable();
            $table->text('about',400)->nullable();
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
        Schema::dropIfExists('reviewer_information');
    }
};
