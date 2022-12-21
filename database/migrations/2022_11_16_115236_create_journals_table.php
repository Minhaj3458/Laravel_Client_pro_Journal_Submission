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
        Schema::create('journals', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('journal_type_id');
            $table->string('name',250);
            $table->string('email',250);
            $table->string('phone_number',20);
            $table->text('topic_name',400);
            $table->string('student_id',250)->nullable();
            $table->string('teacher_id',250)->nullable();
            $table->string('department',100);
            $table->string('batch',50)->nullable();
            $table->string('submit_by',70);
            $table->tinyInteger('status')->default('0');
            $table->string('pdf');
            $table->text('description',500)->nullable();
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
        Schema::dropIfExists('journals');
    }
};
