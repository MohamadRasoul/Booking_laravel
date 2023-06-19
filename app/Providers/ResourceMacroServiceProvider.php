<?php

namespace App\Providers;

use Closure;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\MissingValue;

class ResourceMacroServiceProvider extends ServiceProvider
{
    public function boot()
    {
        JsonResource::macro('whenLoadedRelation', macro: function ($relation, $default = null, ...$attributes) {
            $relations = explode('.', $relation);
            $isHasRelation = function ($model, $attribute) {
                $allowed_relations = array_keys($model->getRelations());
                return in_array($attribute, $allowed_relations) ? true : false;
            };
            $model = $this;

            foreach ($relations as $relation) {
                if (!$isHasRelation($model, $relation)) {
                    return new MissingValue;
                }
                $model = $model->{$relation};
            }

            if (!isset($model)) {
                return new MissingValue;
            }

            if ($default instanceof Closure) {
                $default = $default($model, ...$attributes);
            }

            return isset($default) ? $default : $model;
        });


    }
}
