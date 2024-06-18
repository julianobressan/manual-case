<?php

namespace App\Modules\Common\Exceptions;

/**
 * @author Juliano Bressan <bressan.rs@gmail.com>
 */
interface AppExceptionInterface
{
    /**
     * Gets the HTTP code that represents the exception.
     * @return int
     */
    public function getHttpCode(): int;

    /**
     * Gets an array with validation errors, if applicable.
     * @return array
     */
    public function getErrors(): array;

    public function getData(): array;
}
