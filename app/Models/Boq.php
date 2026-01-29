<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Boq extends Model
{
    public function progressEntries()
    {
        return $this->hasMany(ProgressEntry::class, 'boq_code', 'boq_code');
    }

    public function getAmountAttribute()
    {
        return $this->budget_qty * $this->unit_rate;
    }

    public function getProgressAttribute()
    {
        if ($this->budget_qty <= 0) return 0;
        $totalActual = $this->progressEntries->sum('actual_qty');
        return ($totalActual / $this->budget_qty) * 100;
    }


}
