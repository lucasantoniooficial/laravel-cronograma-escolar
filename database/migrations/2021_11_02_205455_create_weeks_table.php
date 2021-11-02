<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWeeksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('weeks', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->char('code',1);
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('week_team', function (Blueprint $table) {
            $table->foreignId('week_id')->constrained('weeks')->cascadeOnDelete();
            $table->foreignId('team_id')->constrained('teams')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('week_team');
        Schema::dropIfExists('weeks');
    }
}
