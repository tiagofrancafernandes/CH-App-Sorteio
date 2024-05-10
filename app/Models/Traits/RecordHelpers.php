<?php

namespace App\Models\Traits;

trait RecordHelpers
{
    public function getSingleItemCacheKeyAttribute()
    {
        $id = $this->{'id'};

        if (!$id) {
            return null;
        }

        return implode(
            '-',
            array_filter([
                tenant('id'),
                __CLASS__,
                'id',
                $id,
            ])
        );
    }
}
