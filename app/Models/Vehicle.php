<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vehicle extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    public function scopeFilter($query, $params)
    {
        $query->when($params['brand_id'], function ($q, $p) {
            $q->where('brand_id', $p);
        })->when($params['fuel_type_id'], function ($q, $p) {
            $q->where('fuel_type_id', $p);
        })->when($params['gear_type_id'], function ($q, $p) {
            $q->where('gear_type_id', $p);
        })->when($params['class_group_id'], function ($q, $p) {
            $q->where('class_group_id', $p);
        });

        return $query;
    }

    public function fuel_type(): BelongsTo
    {
        return $this->belongsTo(FuelType::class);
    }

    public function gear_type(): BelongsTo
    {
        return $this->belongsTo(GearType::class);
    }

    public function class_group(): BelongsTo
    {
        return $this->belongsTo(ClassGroup::class);
    }

    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class);
    }

}
