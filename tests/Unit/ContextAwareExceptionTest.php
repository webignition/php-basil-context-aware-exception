<?php
/** @noinspection PhpDocSignatureInspection */

namespace webignition\BasilContextAwareException\Tests\Unit;

use webignition\BasilContextAwareException\Tests\DataProvider\ExceptionContextDataProviderTrait;
use webignition\BasilContextAwareException\Tests\Implementation\ContextAwareException;

class ContextAwareExceptionTest extends \PHPUnit\Framework\TestCase
{
    use ExceptionContextDataProviderTrait;

    /**
     * @dataProvider exceptionContextDataProvider
     */
    public function testCreate(
        array $values,
        ?string $expectedTestName,
        ?string $expectedStepName,
        ?string $expectedContent
    ) {
        $contextAwareException = new ContextAwareException($values);

        $exceptionContext = $contextAwareException->getExceptionContext();

        $this->assertSame($expectedTestName, $exceptionContext->getTestName());
        $this->assertSame($expectedStepName, $exceptionContext->getStepName());
        $this->assertSame($expectedContent, $exceptionContext->getContent());
    }
}
