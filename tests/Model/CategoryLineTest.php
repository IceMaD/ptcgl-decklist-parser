<?php

namespace Tests\Model;

use Icemad\PtcglDecklistParser\Model\CategoryLine;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(CategoryLine::class)]
class CategoryLineTest extends TestCase
{
    public function test(): void
    {
        $line = new CategoryLine('Pokémon : 9', 9, 'Pokémon');

        self::assertSame('Pokémon : 9', $line->getRaw());
        self::assertEquals(9, $line->getCount());
        self::assertSame('Pokémon', $line->getCategory());
    }
}
