<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPairAnswerIdToRightPairOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('right_pair_options', function (Blueprint $table) {
            $table->foreignId('pair_answer_id')->nullable()->constrained()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('right_pair_options', function (Blueprint $table) {
            $table->dropColumn('pair_answer_id');
        });
    }
}
