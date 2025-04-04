<?php

declare(strict_types=1);

namespace App;

trait HasId
{
    public function __construct(
        private readonly string $value,
    ) {
    }

    public static function create(string $value): self
    {
        return new self($value);
    }

    public function value(): string
    {
        return $this->value;
    }

    public function __is_identical(self $value): bool
    {
        return $this->value === $value->value;
    }

    public function __is_not_identical(self $value): bool
    {
        return $this->value !== $value->value;
    }
}
