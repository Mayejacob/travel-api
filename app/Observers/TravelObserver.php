<?php

namespace App\Observers;

use App\Models\Travel;
use Illuminate\Support\Str;

class TravelObserver
{
    /**
     * Handle the Travel "created" event.
     */
    public function creating(Travel $travel): void
    {
        $slug = Str::slug($travel->name);
        $originalSlug = $slug;
        $count = 2;

        while (Travel::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $count;
            $count++;
        }

        $travel->slug = $slug;
    }
    public function created(Travel $travel): void
    {
        //
    }

    /**
     * Handle the Travel "updated" event.
     */
    public function updated(Travel $travel): void
    {
        //
    }

    /**
     * Handle the Travel "deleted" event.
     */
    public function deleted(Travel $travel): void
    {
        //
    }

    /**
     * Handle the Travel "restored" event.
     */
    public function restored(Travel $travel): void
    {
        //
    }

    /**
     * Handle the Travel "force deleted" event.
     */
    public function forceDeleted(Travel $travel): void
    {
        //
    }
}
