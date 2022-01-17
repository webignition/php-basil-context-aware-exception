<?php

namespace webignition\BasilContextAwareException\Tests\Unit\ExceptionContext;

use webignition\BasilContextAwareException\ExceptionContext\ExceptionContext;
use webignition\BasilContextAwareException\ExceptionContext\ExceptionContextInterface;
use webignition\BasilContextAwareException\Tests\DataProvider\ExceptionContextDataProviderTrait;

class ExceptionContextTest extends \PHPUnit\Framework\TestCase
{
    use ExceptionContextDataProviderTrait;

    /**
     * @dataProvider exceptionContextDataProvider
     *
     * @param array<null|string> $values
     */
    public function testCreate(
        array $values,
        ?string $expectedTestName,
        ?string $expectedStepName,
        ?string $expectedContent
    ): void {
        $exceptionContext = new ExceptionContext($values);

        $this->assertSame($expectedTestName, $exceptionContext->getTestName());
        $this->assertSame($expectedStepName, $exceptionContext->getStepName());
        $this->assertSame($expectedContent, $exceptionContext->getContent());
    }

    /**
     * @dataProvider applyDataProvider
     *
     * @param array<string, null|string> $values
     */
    public function testApply(
        ExceptionContextInterface $exceptionContext,
        array $values,
        ExceptionContextInterface $expectedExceptionContext
    ): void {
        $exceptionContext->apply($values);

        $this->assertEquals($expectedExceptionContext, $exceptionContext);
    }

    /**
     * @return array[]
     */
    public function applyDataProvider(): array
    {
        return [
            'empty context, empty values' => [
                'exceptionContext' => new ExceptionContext(),
                'values' => [],
                'expectedExceptionContext' => new ExceptionContext(),
            ],
            'test name only context, empty values' => [
                'exceptionContext' => new ExceptionContext([
                    ExceptionContextInterface::KEY_TEST_NAME => 'test name',
                ]),
                'values' => [],
                'expectedExceptionContext' => new ExceptionContext([
                    ExceptionContextInterface::KEY_TEST_NAME => 'test name',
                ]),
            ],
            'step name only context, empty values' => [
                'exceptionContext' => new ExceptionContext([
                    ExceptionContextInterface::KEY_STEP_NAME => 'step name',
                ]),
                'values' => [],
                'expectedExceptionContext' => new ExceptionContext([
                    ExceptionContextInterface::KEY_STEP_NAME => 'step name',
                ]),
            ],
            'content only context, empty values' => [
                'exceptionContext' => new ExceptionContext([
                    ExceptionContextInterface::KEY_CONTENT => 'content',
                ]),
                'values' => [],
                'expectedExceptionContext' => new ExceptionContext([
                    ExceptionContextInterface::KEY_CONTENT => 'content',
                ]),
            ],
            'full context, empty values' => [
                'exceptionContext' => new ExceptionContext([
                    ExceptionContextInterface::KEY_TEST_NAME => 'test name',
                    ExceptionContextInterface::KEY_STEP_NAME => 'step name',
                    ExceptionContextInterface::KEY_CONTENT => 'content',
                ]),
                'values' => [],
                'expectedExceptionContext' => new ExceptionContext([
                    ExceptionContextInterface::KEY_TEST_NAME => 'test name',
                    ExceptionContextInterface::KEY_STEP_NAME => 'step name',
                    ExceptionContextInterface::KEY_CONTENT => 'content',
                ]),
            ],
            'content context, add test name and step name values' => [
                'exceptionContext' => new ExceptionContext([
                    ExceptionContextInterface::KEY_CONTENT => 'content',
                ]),
                'values' => [
                    ExceptionContextInterface::KEY_TEST_NAME => 'test name',
                    ExceptionContextInterface::KEY_STEP_NAME => 'step name',
                ],
                'expectedExceptionContext' => new ExceptionContext([
                    ExceptionContextInterface::KEY_TEST_NAME => 'test name',
                    ExceptionContextInterface::KEY_STEP_NAME => 'step name',
                    ExceptionContextInterface::KEY_CONTENT => 'content',
                ]),
            ],
        ];
    }
}
