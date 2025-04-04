<?php

declare(strict_types=1);

namespace App;

class UserService
{
    public function __construct(
        private UserRepository $repository,
    ) {
    }

    public function users(): UserRepository
    {
        return $this->repository;
    }
}
