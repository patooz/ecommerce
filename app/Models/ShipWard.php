<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShipWard extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function county()
    {
        return $this->belongsTo(ShipCounty::class, 'county_id', 'id');
    }

    public function subcounty()
    {
        return $this->belongsTo(ShipSubcounty::class, 'subcounty_id', 'id');
    }
}
