<?php

namespace Tests\Model;

use Icemad\PtcglDecklistParser\Model\CardLine;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(CardLine::class)]
class CardLineTest extends TestCase
{
    public function test(): void
    {
        $line = new CardLine('1 Iron Treads TEF 118', 1, 'Iron Treads', 'TEF', 118);

        self::assertSame('1 Iron Treads TEF 118', $line->getRaw());
        self::assertEquals(1, $line->getCount());
        self::assertEquals('Iron Treads', $line->getName());
        self::assertSame('TEF', $line->getSet());
        self::assertEquals(118, $line->getCardNumber());
    }
}
