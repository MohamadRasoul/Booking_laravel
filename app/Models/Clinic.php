<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

//use Spatie\MediaLibrary\HasMedia;
//use Spatie\MediaLibrary\InteractsWithMedia;

class Clinic extends Model //implements HasMedia
{
    use HasFactory;

    //use InteractsWithMedia;


    protected $fillable = [
        'name',
        'about',
        'experience_years',
        'day_slot_number',
        'open_at',
        'close_at',
        'open_days',
        'clinic_specialization_id',
        'admin_id',
        'city_id'
    ];

    protected $casts = [
        'open_days' => 'array'
    ];

    public function admin(): BelongsTo
    {
        return $this->belongsTo(Admin::class);
    }

    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }

    public function clinicSpecialization(): BelongsTo
    {
        return $this->belongsTo(ClinicSpecialization::class);
    }

    ########## Relations ##########

    public function clinicSessions(): HasMany
    {
        return $this->hasMany(ClinicSession::class);
    }

    public function scopeIsOpen(Builder $query, $is_open)
    {
        $now_day = now()->dayOfWeek;
        if ($is_open) {
            return $query->where(function ($q) use ($now_day) {
                $q->where('open_at', '<=', now()->format('H:i:s'))
                    ->where('close_at', '>=', now()->format('H:i:s'))
                    ->whereJsonContains('open_days', $now_day);
            });

        } else {
            return $query->where(function ($q) use ($now_day) {
                $q->where('open_at', '>', now()->format('H:i:s'))
                    ->where('close_at', '<', now()->format('H:i:s'))
                    ->orWhereJsonDoesntContain('open_days', $now_day);
            });
        }
    }

    ########## Libraries ##########


    // public function registerMediaCollections(): void
    // {
    //     $this
    //         ->addMediaCollection('Clinic')
    //         ->useFallbackUrl(config('app.url') . '/images/default.jpg')
    //         ->singleFile();
    // }

}
