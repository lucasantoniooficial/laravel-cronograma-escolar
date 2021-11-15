<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->foreignId('teacher_id')->nullable()->constrained('teachers')->cascadeOnDelete();
            $table->string('name');
            $table->date('date');
            $table->text('description')->nullable();
            $table->boolean('recorrency')->default(false);
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('event_team', function(Blueprint $table) {
           $table->foreignId('event_id')->constrained('events')->cascadeOnDelete();
           $table->foreignId('teams_id')->constrained('teams')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('event_team');
        Schema::dropIfExists('events');
    }
}
