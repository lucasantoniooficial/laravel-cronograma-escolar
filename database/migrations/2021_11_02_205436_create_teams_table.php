<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teams', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->char('code',14);
            $table->date('start');
            $table->char('hours',10);
            $table->char('color',7);
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('team_teacher', function (Blueprint $table) {
           $table->foreignId('team_id')->constrained('teams')->cascadeOnDelete();
           $table->foreignId('teacher_id')->constrained('teachers')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('team_teacher');
        Schema::dropIfExists('teams');
    }
}
