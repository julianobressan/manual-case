<?php

namespace App\Modules\Common\Exceptions;

use Exception;
use Throwable;

/**
 * Base for exceptions raised in this application.
 * @author Juliano Bressan <bressan.rs@gmail.com>
 */
class AppException extends Exception implements AppExceptionInterface
{

    /**
     * @param string $message
     * @param array $errors
     * @param int $httpCode
     * @param array $data
     * @param Throwable|null $previous
     */
    public function __construct(
        string $message = 'An error has occurred while performing the action.',
        private readonly array $errors = [],
        private readonly int $httpCode = 500,
        private readonly array $data = [],
        private readonly ?Throwable $previous = null
    ) {
        parent::__construct($message, previous: $this->previous);
    }

    /**
     * @inheritDoc
     */
    public function getHttpCode(): int
    {
        return $this->httpCode;
    }

    /**
     * @inheritDoc
     */
    public function getErrors(): array
    {
        return $this->errors;
    }

    /**
     * Gets the data sent in the request, if applicable.
     * @return array
     */
    public function getData(): array
    {
        return $this->data;
    }
}
