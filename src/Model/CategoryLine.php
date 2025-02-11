<?php

namespace Icemad\PtcglDecklistParser\Model;

final readonly class CategoryLine implements LineInterface
{
    public function __construct(
        private string $raw,
        private int $count,
        private string $category,
    ) {
    }

    public function getCategory(): string
    {
        return $this->category;
    }

    public function getCount(): int
    {
        return $this->count;
    }

    public function getRaw(): string
    {
        return $this->raw;
    }
}
