<?php
declare(strict_types=1);

namespace src\Service;

interface MailerInterface
{
    public function sendMail(string $to, string $body): void;
}