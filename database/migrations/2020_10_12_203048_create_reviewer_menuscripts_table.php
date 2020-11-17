<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReviewerMenuscriptsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reviewer_menuscripts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('reviewer_id');
            $table->unsignedBigInteger('menuscript_id');
            $table->boolean('status');
            $table->integer('qus1');
            $table->integer('qus2');
            $table->integer('qus3');
            $table->integer('qus4');
            $table->integer('qus5');
            $table->integer('mark');
            $table->string('comment')->nullable();
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
        Schema::dropIfExists('reviewer_menuscripts');
    }
}
