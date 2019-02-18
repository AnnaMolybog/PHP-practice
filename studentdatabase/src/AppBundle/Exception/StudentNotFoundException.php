<?php

namespace App\AppBundle\Exception;

use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class StudentNotFoundException extends NotFoundHttpException
{
    const ERROR_MESSAGE = 'User was not found';

    /**
     * StudentNotFountException constructor.
     * @param \Exception|null $exception
     */
    public function __construct(\Exception $exception = null)
    {
        parent::__construct(self::ERROR_MESSAGE, $exception);
    }
}
