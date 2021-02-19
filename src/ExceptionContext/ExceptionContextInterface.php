<?php

namespace webignition\BasilContextAwareException\ExceptionContext;

interface ExceptionContextInterface
{
    public const KEY_TEST_NAME = 'test-name';
    public const KEY_STEP_NAME = 'step-name';
    public const KEY_CONTENT = 'content';

    public function getTestName(): ?string;
    public function getStepName(): ?string;
    public function getContent(): ?string;

    /**
     * @param array<string|null> $values
     */
    public function apply(array $values): void;
}
