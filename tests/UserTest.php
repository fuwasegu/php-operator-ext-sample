<?php

declare(strict_types=1);

namespace tests;

use App\User;
use App\UserId;
use App\UserRepository;
use App\UserService;
use Mockery;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    #[Test]
    public function assertion(): void
    {
        $repository = new UserRepository();

        $user_1 = $repository->findById(UserId::create('xxx'));
        $user_2 = $repository->findById(UserId::create('xxx'));

        // Equals も Same もちゃんと動くかどうか
        $this->assertEquals($user_1->id, $user_2->id);
        $this->assertSame($user_1->id, $user_2->id);
    }

    #[Test]
    public function mockery(): void
    {
        $repository = Mockery::mock(UserRepository::class);
        $service = new UserService($repository);

        // Mockery/Expectation::with() が機能するかどうか
        $repository
            ->expects('findById')
            ->with(UserId::create('xxx'))
            ->andReturn(new User(UserId::create('xxx'), '山田'));

        $user = $service->users()->findById(UserId::create('xxx'));

        $this->assertSame(UserId::create('xxx'), $user->id);
        $this->assertSame('山田', $user->name);
    }
}