<?php

namespace App\Modules\Common\Traits;

/**
 * @author Juliano Bressan <bressan.rs@gmail.com>
 */
trait ToArray
{
    public function __toArray(): array
    {
        return get_object_vars($this);
    }
}

