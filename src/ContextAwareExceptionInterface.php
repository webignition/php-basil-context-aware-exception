<?php

namespace webignition\BasilContextAwareException;

use webignition\BasilContextAwareException\ExceptionContext\ExceptionContextInterface;

interface ContextAwareExceptionInterface
{
    public function getExceptionContext(): ExceptionContextInterface;
    public function applyExceptionContext(array $values);
}
