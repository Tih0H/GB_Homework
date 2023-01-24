<?php

namespace Tihon\Architecture\Models;

use SplObserver;
use SplSubject;

class Applicant implements SplObserver
{

    private string $name;
    private string $email;
    private int $experience;

    public function __construct($name, $email, $experience)
    {
        $this->name = $name;
        $this->email = $email;
        $this->experience = $experience;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function update(SplSubject $subject): void
    {
        $name = $this->getName();
        $email = $this->getEmail();
        $vacancy = $subject->getContent();
        $message = "Уважаемый $name!" . PHP_EOL .
            "Новая вакансия: $vacancy" . PHP_EOL;
        echo "Будет отправлено на $email." . PHP_EOL;
        echo $message;
    }
}