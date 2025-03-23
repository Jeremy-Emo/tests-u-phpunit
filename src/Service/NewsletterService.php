<?php
declare(strict_types=1);

namespace src\Service;

use src\Entity\User;
use src\Enum\ColorEnum;

class NewsletterService
{
    public function __construct(
        private FavoriteColorGuessService $favoriteColorGuessService,
        private EmailService $emailService,
        private MailerInterface $mailer,
    ) {
    }

    public function sendMailIfBlue(User $user): bool
    {
        if ($this->favoriteColorGuessService->guessColorForUser($user) === ColorEnum::BLUE) {
            $to = $this->emailService->generateEmail($user);
            $this->mailer->sendMail($to, 'Hello to blue users !');

            return true;
        }

        return false;
    }
}