# ptcgl-decklist-parser

A parser for Pokemon TCG Live decklist

## Features

- **Decklist Parsing**: Convert PTCGL decklist string into structured data for analysis or transformation.
- **Decklist Formatting**: Convert back structured data to decklist string.

## Installation

To include this parser in your project, you can install it via Composer:

```bash
composer require icemad/ptcgl-decklist-parser
```

## Usage

### Parsing

```php
$parser = new DecklistParser([
    new CardLineParser(),
    new CategoryLineParser(),
]);
$result = $parser->parse($deckList) // string containing decklist
```

The output is an instance of `Icemad\PtcglDecklistParser\Model\ParsingResult`.  
It the parsing is successful, `ParsingResult::getParsingFailures` should return an empty array.

### Formatting

```php
$string = new DecklistFormatter()->format($result->getParsedLines());
```
