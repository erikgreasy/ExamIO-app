<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttendancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attendances', function (Blueprint $table) {
            $table->id();
            $table->foreignId('exam_id')->constrained();
            $table->timestamp('started_at');
            $table->boolean('active');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('ais_id');
            $table->integer('points')->default(0);
            $table->timestamps();
            $table->unique(['exam_id', 'ais_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('attendances');
    }
}
