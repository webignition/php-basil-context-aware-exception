<?php

namespace webignition\BasilContextAwareException\Tests\Unit;

use webignition\BasilContextAwareException\Tests\DataProvider\ExceptionContextDataProviderTrait;
use webignition\BasilContextAwareException\Tests\Implementation\ContextAwareException;

class ContextAwareExceptionTest extends \PHPUnit\Framework\TestCase
{
    use ExceptionContextDataProviderTrait;

    /**
     * @dataProvider exceptionContextDataProvider
     *
     * @param array<string|null> $values
     */
    public function testCreate(
        array $values,
        ?string $expectedTestName,
        ?string $expectedStepName,
        ?string $expectedContent
    ): void {
        $contextAwareException = new ContextAwareException($values);

        $exceptionContext = $contextAwareException->getExceptionContext();

        $this->assertSame($expectedTestName, $exceptionContext->getTestName());
        $this->assertSame($expectedStepName, $exceptionContext->getStepName());
        $this->assertSame($expectedContent, $exceptionContext->getContent());
    }
}
