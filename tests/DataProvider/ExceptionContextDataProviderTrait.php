<?php
/** @noinspection PhpDocSignatureInspection */

namespace webignition\BasilContextAwareException\Tests\DataProvider;

use webignition\BasilContextAwareException\ExceptionContext\ExceptionContext;

trait ExceptionContextDataProviderTrait
{
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
                    ExceptionContext::KEY_TEST_NAME => 'test name',
                ],
                'expectedTestName' => 'test name',
                'expectedStepName' => null,
                'expectedContent' => null,
            ],
            'step name only' => [
                'values' => [
                    ExceptionContext::KEY_STEP_NAME => 'step name',
                ],
                'expectedTestName' => null,
                'expectedStepName' => 'step name',
                'expectedContent' => null,
            ],
            'content only' => [
                'values' => [
                    ExceptionContext::KEY_CONTENT => 'content',
                ],
                'expectedTestName' => null,
                'expectedStepName' => null,
                'expectedContent' => 'content',
            ],
            'all values' => [
                'values' => [
                    ExceptionContext::KEY_TEST_NAME => 'test name',
                    ExceptionContext::KEY_STEP_NAME => 'step name',
                    ExceptionContext::KEY_CONTENT => 'content',
                ],
                'expectedTestName' => 'test name',
                'expectedStepName' => 'step name',
                'expectedContent' => 'content',
            ],
        ];
    }
}
