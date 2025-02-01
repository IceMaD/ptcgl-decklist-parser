<?php

namespace Tests\Model;

use Icemad\TcglDecklistParser\Model\CardLine;
use Icemad\TcglDecklistParser\Model\CategoryLine;
use Icemad\TcglDecklistParser\Model\ParsingResult;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\UsesClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(ParsingResult::class)]
#[UsesClass(CardLine::class)]
#[UsesClass(CategoryLine::class)]
class ParsingResultTest extends TestCase
{
    public function test(): void
    {
        $result = new ParsingResult([
            $categoryLine = new CategoryLine('Pokémon : 9', 9, 'Pokémon'),
            $cardLine = new CardLine('1 Iron Treads TEF 118', 1, 'TEF', 118),
        ],
            [
                $failure = 'unparsable',
            ],
        );

        self::assertCount(2, $result->getParsedLines());
        self::assertSame($categoryLine, $result->getParsedLines()[0]);
        self::assertSame($cardLine, $result->getParsedLines()[1]);
        self::assertCount(1, $result->getParsingFailures());
        self::assertSame($failure, $result->getParsingFailures()[0]);
    }
}