<?php

namespace App\Observers;

use App\Models\Position;

class PositionObserver
{
    /**
     * @param Position $position
     */
    public function creating(Position $position) : void
    {
        $position->admin_created_id = auth()->id();
    }

    /**
     * @param Position $position
     */
    public function updating(Position $position) : void
    {
        $position->admin_updated_id = auth()->id();
    }
}
