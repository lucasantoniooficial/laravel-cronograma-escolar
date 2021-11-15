<?php

namespace App\Console\Commands;

use App\Models\Event;
use Illuminate\Console\Command;

class EventRecorrency extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'event:recorrency';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Valida se o evento recorrente já passou do ano passado';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $events = Event::where('recorrency',1)->orderByDesc('id')->get();
        if(Event::where('date', now()->format('Y').'-10-15')->count() === 0) {
            foreach($events as $event) {
                $newEvent = $event->replicate()->fill([
                    'date' => $event->date->setYear(now()->format('Y'))
                ]);

                $newEvent->save();
            }
        }
    }
}
