<?php

namespace App\Traits;

use App\Models\PlaceContact;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\MorphOne;

trait PlaceContactRelationTrait
{
    protected static function bootPlaceContactRelationTrait(): void
    {
        static::addGlobalScope('withPlaceContact', function (Builder $builder) {
            $builder->with(['placeContact']);
        });
    }


    public function placeContact(): MorphOne
    {
        return $this->morphOne(PlaceContact::class, 'placeContactable');
    }
}
