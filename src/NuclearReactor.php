<?php
declare(strict_types=1);

namespace App;

class NuclearReactor
{
    public function isDangerous(int $temperature): bool
    {
        if ($temperature > 1000) {
            return true;
        } else {
            return false;
        }
    }
}