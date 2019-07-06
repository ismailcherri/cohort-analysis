<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;

class RetentionStat extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'created_at',
        'onboarding_percentage',
        'count_applications',
        'count_accepted_applications'
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Returns a collection of weekly cohorts
     *
     * @return RetentionStat[]|\Illuminate\Database\Eloquent\Collection|Collection
     */
    public static function getWeeklyCohorts(){
        $stat = RetentionStat::all()
            ->groupBy(function($date){
                return Carbon::parse($date->created_at)->format('W');
            })
            ->keyBy(function(Collection $items, $index){
                $date = Carbon::createFromDate($items->first()->created_at);
                $date->setISODate($date->format('Y'),$index);
                return $date->startOfWeek()->format('Y-m-d');

            })
            ->map(function($items){
                /** @var Collection $items */
                $weekly_users = $items->count();
                return collect([
                        '0' => $items->filter(function($item){
                            return $item->onboarding_percentage > 0 && $item->onboarding_percentage <= 100;
                        })->count(),
                        '20' => $items->filter(function($item){
                            return $item->onboarding_percentage > 20 && $item->onboarding_percentage <= 100;
                        })->count(),
                        '40' => $items->filter(function($item){
                            return $item->onboarding_percentage > 40 && $item->onboarding_percentage <= 100;
                        })->count(),
                        '50' => $items->filter(function($item){
                            return $item->onboarding_percentage > 50 && $item->onboarding_percentage <= 100;
                        })->count(),
                        '70' => $items->filter(function($item){
                            return $item->onboarding_percentage > 70 && $item->onboarding_percentage <= 100;
                        })->count(),
                        '90' => $items->filter(function($item){
                            return $item->onboarding_percentage > 90 && $item->onboarding_percentage <= 100;
                        })->count(),
                        '99' => $items->filter(function($item){
                            return $item->onboarding_percentage > 99 && $item->onboarding_percentage <= 100;
                        })->count(),
                        '100' => $items->filter(function($item){
                            return $item->onboarding_percentage === 100;
                        })->count()
                    ])->map(function($item) use($weekly_users){
                        return round($item / $weekly_users * 100);
                    })->values();
            })->map(function($item, $index){
                return [
                    'name' => $index,
                    'data' => $item
                ];
            })->values();

        return $stat;
    }
}
