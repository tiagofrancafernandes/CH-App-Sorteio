<?php

namespace App\Helpers;

class StringHelpers extends \TiagoF2\Helpers\StringHelpers
{
    public static function uidGenerator(?string $prefix = null, ?string $suffix = null, int $minSize = 14): string
    {
        $minSize = $minSize > 12 ? $minSize : 14;

        $uid = str_pad(uniqid(), $minSize, str_shuffle(uniqid()));

        return strtoupper(
            implode('-', array_filter(
                [
                    $prefix,
                    ...explode(PHP_EOL, chunk_split($uid, 5, PHP_EOL)),
                    $suffix,
                ],
            ))
        );
    }
}
