<?php
/** @noinspection PhpDocSignatureInspection */

namespace webignition\BasilContextAwareException\Tests\ExceptionContext;

use webignition\BasilContextAwareException\ExceptionContext\ExceptionContext;

class ExceptionContextTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @dataProvider createDataProvider
     */
    public function testCreate(
        array $values,
        ?string $expectedTestName,
        ?string $expectedStepName,
        ?string $expectedContent
    ) {
        $exceptionContext = new ExceptionContext($values);

        $this->assertSame($expectedTestName, $exceptionContext->getTestName());
        $this->assertSame($expectedStepName, $exceptionContext->getStepName());
        $this->assertSame($expectedContent, $exceptionContext->getContent());
    }

    public function createDataProvider(): array
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
