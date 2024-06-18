<?php

namespace App\Modules\Common\Exceptions;

use Throwable;

/**
 * Validation exception raised in this application.
 * @author Juliano Bressan <bressan.rs@gmail.com>
 */
class ValidationException extends AppException implements AppExceptionInterface
{

    /**
     * @param array $errors
     * @param array $data
     * @param Throwable|null $previous
     */
    public function __construct(
        array $errors = [],
        array $data = [],
        ?Throwable $previous = null
    ) {
        parent::__construct('There are invalid params in your request.', $errors, 422, $data, $previous);
    }
}
