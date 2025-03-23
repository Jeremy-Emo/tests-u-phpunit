<?php
declare(strict_types=1);

namespace src\Repository;

use src\Entity\User;

class UserRepository
{
    public function __construct(private DatabaseInterface $database)
    {
    }

    public function save(User $user): void
    {
        $this->database->save($user);
    }

    public function saveWealthyUser(User $user): void
    {
        $user->setAccountAmount(1000000000);
        $this->database->save($user);
    }
}