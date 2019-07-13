<?php
/** @noinspection PhpDocSignatureInspection */

namespace webignition\BasilContextAwareException\Tests\Unit\ExceptionContext;

use webignition\BasilContextAwareException\ExceptionContext\ExceptionContext;
use webignition\BasilContextAwareException\Tests\DataProvider\ExceptionContextDataProviderTrait;

class ExceptionContextTest extends \PHPUnit\Framework\TestCase
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
        $exceptionContext = new ExceptionContext($values);

        $this->assertSame($expectedTestName, $exceptionContext->getTestName());
        $this->assertSame($expectedStepName, $exceptionContext->getStepName());
        $this->assertSame($expectedContent, $exceptionContext->getContent());
    }
}
