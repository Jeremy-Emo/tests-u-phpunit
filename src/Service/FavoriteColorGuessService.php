<?php
declare(strict_types=1);

namespace src\Service;

use src\Entity\User;
use src\Enum\ColorEnum;
use src\Exception\InvalidUserException;

class FavoriteColorGuessService
{
    public function guessColorForUser(User $user): ColorEnum
    {
        if ($user->getLastName() === '') {
            throw new InvalidUserException('Last name cannot be empty');
        }

        if ($user->getFirstName() === '') {
            return ColorEnum::RED;
        }

        if (strtoupper($user->getLastName()) === 'PICSOU') {
            return ColorEnum::GOLD;
        }

        return $this->getColorByAccount($user);
    }

    private function getColorByAccount(User $user): ColorEnum
    {
        if ($user->getAccountNumber() !== null && $user->getAccountAmount() > 0) {
            if ($user->getAccountNumber() !== '') {
                if ($user->getAccountAmount() > 100) {
                    return ColorEnum::GREEN;
                } else {
                    return ColorEnum::BLUE;
                }
            }
            return ColorEnum::RED;
        }

        return ColorEnum::RED;
    }
}