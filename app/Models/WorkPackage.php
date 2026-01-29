<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WorkPackage extends Model
{
    public function boqs()
    {
        return $this->hasMany(Boq::class);
    }

    public function getTotalAmountAttribute()
    {
        return $this->boqs->sum('amount');
    }

    public function getWpProgressAttribute(): float|int
    {
        $totalAmount = $this->total_amount;
        if ($totalAmount <= 0)
            return 0;

        $weightSum = $this->boqs->sum(function ($boq) {
            return ($boq->progress / 100) * $boq->amount;
        });

        return ($weightSum / $totalAmount) * 100;
    }
}
