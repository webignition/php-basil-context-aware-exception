<?php

namespace webignition\BasilContextAwareException\Tests\Implementation;

use webignition\BasilContextAwareException\ContextAwareExceptionInterface;
use webignition\BasilContextAwareException\ContextAwareExceptionTrait;
use webignition\BasilContextAwareException\ExceptionContext\ExceptionContext;

class ContextAwareException extends \Exception implements ContextAwareExceptionInterface
{
    use ContextAwareExceptionTrait;

    public function __construct(array $values)
    {
        parent::__construct();

        $this->exceptionContext = new ExceptionContext();
        $this->applyExceptionContext($values);
    }
}
