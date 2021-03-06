<?php

declare(strict_types=1);

namespace Eloquent\Phony\Phpunit;

use PHPUnit\Framework\TestCase;

class ConstraintMatcherTest extends TestCase
{
    protected function setUp(): void
    {
        $this->matcher = $this->equalTo('x');
        $this->subject = new ConstraintMatcher($this->matcher);
    }

    public function testConstructor(): void
    {
        $this->assertSame("<is equal to 'x'>", $this->subject->describe());
        $this->assertSame("<is equal to 'x'>", strval($this->subject));
    }

    public function testMatches(): void
    {
        $this->assertTrue($this->subject->matches('x'));
        $this->assertFalse($this->subject->matches('y'));
    }
}
