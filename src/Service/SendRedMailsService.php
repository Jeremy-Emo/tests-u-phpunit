<?php
declare(strict_types=1);

namespace src\Service;

use src\Entity\User;
use src\Enum\ColorEnum;
use src\Repository\UserRepository;

class SendRedMailsService
{
    public function __construct(private MailerInterface $mailer, private FavoriteColorGuessService $favoriteColorGuessService, private UserRepository $userRepository)
    {
    }

    public function sendMailForUser(User $user): void
    {
        $body = 'Mon super message';

        $body .= self::textForColors($this->favoriteColorGuessService->guessColorForUser($user));

        $body.= $this->textForFirstNameStart($user->getFirstName());

        if (strlen($body) > 200) {
            $user->setLastMailSend('SendRedMailsService::sendMailForUser');
            $this->userRepository->save($user);
        }

        if (strlen($body) < 200) {
            $user->setLastMailSend('SendRedMailsService::sendMailForUser mais petit');
            $this->userRepository->save($user);
        }

        if ($user->getAccountAmount() - 150 >= 0) {
            $user->setAccountAmount($user->getAccountAmount() - 150);
            $username = self::generateEmail($user);
            $this->mailer->sendMail($username, $body);
        }
    }

    private function textForFirstNameStart(string $firstName): string
    {
        if (str_starts_with($firstName, 'b')) {
            return '\r\n C\'est l\'année du B, vous êtes chanceux !';
        }

        if (str_starts_with($firstName, 'ce')) {
            return '\r\n Votre prénom commence par ce !';
        }

        if (str_starts_with($firstName, 'c')) {
            return '\r\n Ce n\'est pas l\'année du C, vous êtes malchanceux :(';
        }

        return '';
    }

    private static function textForColors(ColorEnum $color): string
    {
        return match ($color) {
            ColorEnum::RED => '\r\n Bonjour rouge !',
            ColorEnum::BLUE => '\r\n Bonjour bleu !',
            default => '\r\n Bonjour !',
        };
    }

    private static function generateEmail($user): string
    {
        // TODO : utiliser le EmailService
        $username = strtolower(trim($user->getFirstName())) . '.' . strtolower(trim($user->getLastName()));
        return preg_replace('/[^a-z0-9.]/', '', $username);
    }
}