<?php

namespace Tests\Parser;

use Icemad\PtcglDecklistParser\Model\CardLine;
use Icemad\PtcglDecklistParser\Parser\CardLineParser;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\UsesClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(CardLineParser::class)]
#[UsesClass(CardLine::class)]
class CardLineParserTest extends TestCase
{
    #[DataProvider('managedLineProvider')]
    public function testManagedLine(
        string $line,
        int $expectedCount,
        string $expectedName,
        string $expectedSet,
        int $expectedCardNumber,
    ): void {
        $parser = new CardLineParser();

        $parsedLine = $parser->parse($line);

        self::assertNotNull($parsedLine);
        self::assertSame($expectedCount, $parsedLine->getCount());
        self::assertSame($expectedName, $parsedLine->getName());
        self::assertSame($expectedSet, $parsedLine->getSet());
        self::assertSame($expectedCardNumber, $parsedLine->getCardNumber());
    }

    /**
     * @return array<string, array{string, int, string, string, int}>
     */
    public static function managedLineProvider(): array
    {
        return [
            'Basic' => ['1 Latias ex SSP 76', 1, 'Latias ex', 'SSP', 76],
            'Accent' => ['3 Boss\'s Orders PAL 172', 3, 'Boss\'s Orders', 'PAL', 172],
            'Numbers' => ['3 Pokégear 3.0 SVI 186', 3, 'Pokégear 3.0', 'SVI', 186],
            'Energy' => ['5 Basic {L} Energy SVE 12', 5, 'Basic {L} Energy', 'SVE', 12],
        ];
    }

    #[DataProvider('nonManagedLineProvider')]
    public function testNonManagedLine(string $line): void
    {
        self::assertNull(new CardLineParser()->parse($line));
    }

    /**
     * @return array<string, array{string}>
     */
    public static function nonManagedLineProvider(): array
    {
        return [
            'Empty' => [''],
            'Category' => ['Énergie : 3'],
        ];
    }
}
