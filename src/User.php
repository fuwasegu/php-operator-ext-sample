<?php

declare(strict_types=1);

namespace App;

class User
{
    public function __construct(
        public readonly UserId $id,
        public readonly string $name,
    ) {
    }
}
