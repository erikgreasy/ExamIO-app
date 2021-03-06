<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRightPairOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('right_pair_options', function (Blueprint $table) {
            $table->id();
            $table->string('text')->nullable();
            $table->foreignId('question_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->boolean('is_original')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('right_pair_options');
    }
}
