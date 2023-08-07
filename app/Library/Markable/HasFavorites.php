<?php

namespace App\Library\Markable;

use Auth;
use Illuminate\Database\Eloquent\Builder;
use Maize\Markable\Markable;
use Maize\Markable\Models\Favorite;

trait HasFavorites
{
    use Markable;


    protected static $marks = [
        Favorite::class,
    ];

    protected static function bootHasFavorites(): void
    {
        static::addGlobalScope('withUserIsFavorite', function (Builder $builder) {
            $user_id = Auth::guard('api_user')->id();

            $builder->addSelect([
                'user_is_favorite' =>
                    Favorite::selectRaw('COUNT(markable_favorites.id)')
                        ->whereColumn('restaurants.id', '=', 'markable_favorites.markable_id')
                        ->where('markable_favorites.markable_type', Self::class)
                        ->where('markable_favorites.user_id', $user_id)
            ]);
        });


        static::addGlobalScope('withFavoritesCount', function (Builder $builder) {

            $builder->withCount('favorites');
        });
    }

}
