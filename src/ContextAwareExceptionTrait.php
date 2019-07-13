<?php

namespace webignition\BasilContextAwareException;

use webignition\BasilContextAwareException\ExceptionContext\ExceptionContextInterface;

trait ContextAwareExceptionTrait
{
    /**
     * @var ExceptionContextInterface
     */
    private $exceptionContext;

    public function getExceptionContext(): ExceptionContextInterface
    {
        return $this->exceptionContext;
    }

    public function applyExceptionContext(array $values)
    {
        $this->exceptionContext->apply($values);
    }
}
