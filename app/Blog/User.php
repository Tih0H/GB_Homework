<?php

namespace Tihon\Lesson1\Blog;
use Tihon\Lesson1\Person\Name;
class User
{
    private UUID $uuid;
    private Name $name;
    private string $username;

    public function __construct(UUID $uuid, Name $username, string $login){
        $this->uuid = $uuid;
        $this->name = $username;
        $this->username = $login;
    }
    public function __toString(): string
    {
        return "Юзер $this->uuid с именем $this->name и логином $this->username." . PHP_EOL;
    }

    /**
     * @return UUID
     */
    public function uuid(): UUID
    {
        return $this->uuid;
    }

    /**
     * @return Name
     */
    public function name(): Name
    {
        return $this->name;
    }

    /**
     * @param Name $name
     */
    public function setUsername(Name $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function username(): string
    {
        return $this->username;
    }

    /**
     * @param string $username
     */
    public function setLogin(string $username): void
    {
        $this->username = $username;
    }

}