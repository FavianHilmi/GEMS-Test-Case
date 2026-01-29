<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    public function workPackages()
    {
        return $this->hasMany(WorkPackage::class);
    }

    public function getOverallProgressAttribute()
    {
        $totalContract = $this->workPackages->sum('total_amount');
        if ($totalContract <= 0)
            return 0;

        $weightSum = $this->workPackages->sum(fn($wp) => ($wp->wp_progress / 100) * $wp->total_amount);
        return ($weightSum / $totalContract) * 100;
    }
}
