<?php

namespace Tests\Parser;

use Icemad\PtcglDecklistParser\Model\CardLine;
use Icemad\PtcglDecklistParser\Model\CategoryLine;
use Icemad\PtcglDecklistParser\Model\LineInterface;
use Icemad\PtcglDecklistParser\Model\ParsingResult;
use Icemad\PtcglDecklistParser\Parser\CardLineParser;
use Icemad\PtcglDecklistParser\Parser\CategoryLineParser;
use Icemad\PtcglDecklistParser\Parser\DecklistParser;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\UsesClass;
use PHPUnit\Framework\TestCase;
use function PHPUnit\Framework\assertCount;

#[CoversClass(DecklistParser::class)]
#[UsesClass(CategoryLineParser::class)]
#[UsesClass(CategoryLine::class)]
#[UsesClass(CardLineParser::class)]
#[UsesClass(CardLine::class)]
#[UsesClass(ParsingResult::class)]
class DecklistParserTest extends TestCase
{
    public function testParse(): void
    {
        $parser = new DecklistParser([
            new CardLineParser(),
            new CategoryLineParser(),
        ]);

        $deckList = file_get_contents(__DIR__.'/../data/decklist.fr.txt');

        if ($deckList === false) {
            throw new \RuntimeException('File not found');
        }

        $result = $parser->parse($deckList);

        $parsedLines = $result->getParsedLines();
        self::assertCount(28, $parsedLines);
        self::assertCount(24, array_filter($parsedLines, fn(LineInterface $line) => $line instanceof CardLine));
        self::assertCount(4, array_filter($parsedLines, fn(LineInterface $line) => $line instanceof CategoryLine));
        assertCount(1, $result->getParsingFailures());
    }
}
