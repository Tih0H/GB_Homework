<?php


class UserProvider
{
    private array $accounts = [
        'admin' => '123',
    ];

    public function getByUsernameAndPassword(string $username, string $password): ?User
    {
        $expectedPassword = $this->accounts[$username] ?? null;
//        var_dump($this->accounts);
//        var_dump($this->accounts[$username]);
//        die();
        if ($expectedPassword === $password) {
            return new User($username);
        }

        return null;
    }
}