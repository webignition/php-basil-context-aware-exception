<?php

namespace webignition\BasilContextAwareException\ExceptionContext;

class ExceptionContext implements ExceptionContextInterface
{
    private ?string $testName = null;
    private ?string $stepName = null;
    private ?string $content = null;

    public function __construct(array $values = [])
    {
        $this->apply($values);
    }

    public function getTestName(): ?string
    {
        return $this->testName;
    }

    public function getStepName(): ?string
    {
        return $this->stepName;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function apply(array $values)
    {
        $this->testName = $values[self::KEY_TEST_NAME] ?? null;
        $this->stepName = $values[self::KEY_STEP_NAME] ?? null;
        $this->content = $values[self::KEY_CONTENT] ?? null;
    }
}
