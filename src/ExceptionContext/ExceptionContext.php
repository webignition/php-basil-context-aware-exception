<?php

namespace webignition\BasilContextAwareException\ExceptionContext;

class ExceptionContext implements ExceptionContextInterface
{
    private ?string $testName = null;
    private ?string $stepName = null;
    private ?string $content = null;

    /**
     * @param array<null|string> $values
     */
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

    public function apply(array $values): void
    {
        $testName = $values[self::KEY_TEST_NAME] ?? null;
        $stepName = $values[self::KEY_STEP_NAME] ?? null;
        $content = $values[self::KEY_CONTENT] ?? null;

        if (null !== $testName) {
            $this->testName = $testName;
        }

        if (null !== $stepName) {
            $this->stepName = $stepName;
        }

        if (null !== $content) {
            $this->content = $content;
        }
    }
}
