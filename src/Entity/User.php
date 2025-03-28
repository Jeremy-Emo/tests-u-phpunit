<?php
declare(strict_types=1);

namespace src\Entity;

class User
{
    private string $firstName;
    private string $lastName;
    private ?string $accountNumber = null;
    private int $accountAmount = 0;

    private ?string $lastMailSend = null;

    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getLastName(): string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): self
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function getAccountNumber(): ?string
    {
        return $this->accountNumber;
    }

    public function setAccountNumber(?string $accountNumber): self
    {
        $this->accountNumber = $accountNumber;

        return $this;
    }

    public function getAccountAmount(): int
    {
        return $this->accountAmount;
    }

    public function setAccountAmount(int $accountAmount): self
    {
        $this->accountAmount = $accountAmount;

        return $this;
    }

    public function getLastMailSend(): ?string
    {
        return $this->lastMailSend;
    }

    public function setLastMailSend(?string $lastMailSend): User
    {
        $this->lastMailSend = $lastMailSend;
        return $this;
    }
}