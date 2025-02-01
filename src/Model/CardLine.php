<?php

namespace Icemad\TcglDecklistParser\Model;

readonly class CardLine implements LineInterface
{
    public function __construct(
        private string $raw,
        private int $count,
        private string $set,
        private int $cardNumber,
    ) {
    }

    public function getCardNumber(): int
    {
        return $this->cardNumber;
    }

    public function getCount(): int
    {
        return $this->count;
    }

    public function getRaw(): string
    {
        return $this->raw;
    }

    public function getSet(): string
    {
        return $this->set;
    }
}