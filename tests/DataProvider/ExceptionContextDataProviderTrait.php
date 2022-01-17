<?php

namespace webignition\BasilContextAwareException\Tests\DataProvider;

use webignition\BasilContextAwareException\ExceptionContext\ExceptionContextInterface;

trait ExceptionContextDataProviderTrait
{
    /**
     * @return array<mixed>
     */
    public function exceptionContextDataProvider(): array
    {
        return [
            'empty' => [
                'values' => [],
                'expectedTestName' => null,
                'expectedStepName' => null,
                'expectedContent' => null,
            ],
            'test name only' => [
                'values' => [
                    ExceptionContextInterface::KEY_TEST_NAME => 'test name',
                ],
                'expectedTestName' => 'test name',
                'expectedStepName' => null,
                'expectedContent' => null,
            ],
            'step name only' => [
                'values' => [
                    ExceptionContextInterface::KEY_STEP_NAME => 'step name',
                ],
                'expectedTestName' => null,
                'expectedStepName' => 'step name',
                'expectedContent' => null,
            ],
            'content only' => [
                'values' => [
                    ExceptionContextInterface::KEY_CONTENT => 'content',
                ],
                'expectedTestName' => null,
                'expectedStepName' => null,
                'expectedContent' => 'content',
            ],
            'all values' => [
                'values' => [
                    ExceptionContextInterface::KEY_TEST_NAME => 'test name',
                    ExceptionContextInterface::KEY_STEP_NAME => 'step name',
                    ExceptionContextInterface::KEY_CONTENT => 'content',
                ],
                'expectedTestName' => 'test name',
                'expectedStepName' => 'step name',
                'expectedContent' => 'content',
            ],
        ];
    }
}
