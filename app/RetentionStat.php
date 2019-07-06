<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
        'onboarding_perentage',
        'count_applications',
        'count_accepted_applications'
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;
}
