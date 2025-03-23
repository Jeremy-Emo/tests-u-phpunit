<?php
declare(strict_types=1);

namespace src\Service;

use src\Entity\User;

class UserService
{
    public function generateUsername(User $user): string
    {
        $username = strtolower(trim($user->getFirstName())) . '.' . strtolower(trim($user->getLastName()));

        return preg_replace('/[^a-z0-9.]/', '', $username);
    }
}