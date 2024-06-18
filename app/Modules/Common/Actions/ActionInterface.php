<?php

namespace App\Modules\Common\Actions;

/**
 * @author Juliano Bressan <bressan.rs@gmail.com>
 */
interface ActionInterface
{
    /**
     * Executes the action using the parameters provided in the constructor.
     */
    public function execute();

}
