<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProgressEntry extends Model
{
    protected $guarded = [];
public function boq()
    {
        return $this->belongsTo(Boq::class, 'boq_code', 'boq_code');
    }
}
