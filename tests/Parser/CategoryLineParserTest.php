<?php

namespace Tests\Parser;

use Icemad\PtcglDecklistParser\Model\CategoryLine;
use Icemad\PtcglDecklistParser\Parser\CardLineParser;
use Icemad\PtcglDecklistParser\Parser\CategoryLineParser;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\UsesClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(CategoryLineParser::class)]
#[UsesClass(CategoryLine::class)]
class CategoryLineParserTest extends TestCase
{
    #[DataProvider('managedLineProvider')]
    public function testManagedLine(
        string $line,
        int $expectedCount,
        string $expectedCategory,
    ): void {
        $parser = new CategoryLineParser();

        $parsedLine = $parser->parse($line);

        self::assertNotNull($parsedLine);
        self::assertSame($expectedCount, $parsedLine->getCount());
        self::assertSame($expectedCategory, $parsedLine->getCategory());
    }

    /**
     * @return array<string, array{string, int, string}>
     */
    public static function managedLineProvider(): array
    {
        return [
            'Pokemon' => ['Pokémon : 9', 9, 'Pokémon'],
            'Trainer' => ['Dresseur : 12', 12, 'Dresseur'],
            'Energy' => ['Énergie : 3', 3, 'Énergie'],
            'Total' => ['Total de cartes : 60', 60, 'Total de cartes'],
        ];
    }

    #[DataProvider('nonManagedLineProvider')]
    public function testNonManagedLine(string $line): void
    {
        self::assertNull(new CategoryLineParser()->parse($line));
    }

    /**
     * @return array<string, array{string}>
     */
    public static function nonManagedLineProvider(): array
    {
        return [
            'Empty' => [''],
            'Card' => ['1 Latias ex SSP 76'],
        ];
    }
}
