<?php

namespace webignition\BasilContextAwareException;

use webignition\BasilContextAwareException\ExceptionContext\ExceptionContextInterface;

trait ContextAwareExceptionTrait
{
    private ExceptionContextInterface $exceptionContext;

    public function getExceptionContext(): ExceptionContextInterface
    {
        return $this->exceptionContext;
    }

    public function applyExceptionContext(array $values): void
    {
        $this->exceptionContext->apply($values);
    }
}
