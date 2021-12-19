<?php

namespace App\Traits;

trait Events
{
    public function calculateDateEnd($days, $start, $weeks,$holidays, $dateEnd = true)
    {
        $datas = collect();

        for($i = 0; $i < $days ; $i++) {
            for($j = 1 ; $j <= 7; $j++) {
                if($weeks->contains($start->format('N'))) {
                    if(!$holidays->contains($start->format('Y-m-d'))) {
                        $datas->push($start->format('Y-m-d'));
                        $start->addDay(1);
                        break;
                    }

                    $j = 0;
                    $datas->push($start->format('Y-m-d'));
                }

                $start->addDay(1);
            }
        }

        if($dateEnd) {
            return $start->subDay(1)->format('d/m/Y');
        }

        return $datas;
    }
}
