<?php
declare(strict_types=1);

namespace src\Service;

use src\Entity\User;
use src\Exception\InvalidUserException;

class EmailService
{
    private const EMAIL_DOMAIN = 'custom.fr';

    public function __construct(private UserService $userService)
    {
    }

    public function generateEmail(User $user): string
    {
        if ($user->getFirstName() === '' || $user->getLastName() === '') {
            throw new InvalidUserException('First name and last name cannot be empty');
        }

        $username = $this->userService->generateUsername($user);

        return $username . '@' . self::EMAIL_DOMAIN;
    }
}