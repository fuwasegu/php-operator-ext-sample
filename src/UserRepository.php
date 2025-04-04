<?php

declare(strict_types=1);

namespace App;

class UserRepository
{
    private readonly array $users;

    public function __construct()
    {
        $this->users = [
            'xxx' => new User(id: UserId::create('xxx'), name: '山田'),
            'yyy' => new User(id: UserId::create('yyy'), name: '田中'),
            'zzz' => new User(id: UserId::create('zzz'), name: '鈴木'),
        ];
    }

    public function findById(UserId $id): null|User
    {
        return $this->users[$id->value()] ?? null;
    }
}
