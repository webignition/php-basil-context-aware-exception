<?php

namespace webignition\BasilContextAwareException;

use webignition\BasilContextAwareException\ExceptionContext\ExceptionContextInterface;

interface ContextAwareExceptionInterface
{
    public function getExceptionContext(): ExceptionContextInterface;

    /**
     * @param array<null|string> $values
     */
    public function applyExceptionContext(array $values): void;
}
