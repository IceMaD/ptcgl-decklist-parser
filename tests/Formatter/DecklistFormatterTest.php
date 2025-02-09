<?php

namespace Formatter;

use Icemad\TcglDecklistParser\Formatter\DecklistFormatter;
use Icemad\TcglDecklistParser\Model\CardLine;
use Icemad\TcglDecklistParser\Model\CategoryLine;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\UsesClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(DecklistFormatter::class)]
#[UsesClass(CategoryLine::class)]
#[UsesClass(CardLine::class)]
class DecklistFormatterTest extends TestCase
{
    public function testFormat(): void
    {
        $parser = new DecklistFormatter();

        $formatted = $parser->format([
            new CategoryLine('', 2, 'Pokémon'),
            new CardLine('', 2, 'Pikachu', 'SSP', 57),
            new CategoryLine('', 3, 'Dresseur'),
            new CardLine('', 3, 'Nemona', 'SVI', 180),
            new CategoryLine('', 4, 'Energie'),
            new CardLine('', 4, 'Basic L Energy', 'SVE', 80),
        ]);

        self::assertSame(<<<EOF
        Pokémon : 2
        2 Pikachu SSP 57
        
        Dresseur : 3
        3 Nemona SVI 180
        
        Energie : 4
        4 Basic L Energy SVE 80
        EOF, $formatted);
    }
}
