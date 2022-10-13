<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Order extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];

    public function county()
    {
        return $this->belongsTo(ShipCounty::class, 'county_id', 'id');
    }

    public function subcounty()
    {
        return $this->belongsTo(ShipSubcounty::class, 'subcounty_id', 'id');
    }

    public function ward()
    {
        return $this->belongsTo(ShipWard::class, 'ward_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

}
