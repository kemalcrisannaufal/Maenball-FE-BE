<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('fixtures', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('type');
            $table->unsignedBigInteger('id_home_team');
            $table->unsignedBigInteger('id_away_team');
            $table->unsignedBigInteger('id_season');
            $table->string('location');
            $table->dateTime('kickoff');
            $table->integer('home_score')->default(0);
            $table->integer('away_score')->default(0);
            $table->string('status')->default('upcoming');


            $table->foreign('id_home_team')->references('id')->on('teams');
            $table->foreign('id_away_team')->references('id')->on('teams');
            $table->foreign('id_season')->references('id')->on('seasons');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fixtures');
    }
};
