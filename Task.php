<?php
//Разработайте класс Task, выполняющий ответственность обычной задачи Todo-списка.
// Класс должен содержать приватные свойства description, dateCreated, dateUpdated, dateDone,
// priority (int), isDone (bool) и обязательное user (User). В качества класса пользователя воспользуйтесь
// разработанным на уроке. Класс Task должен содержать все необходимые для взаимодействия со свойствами методы
// (getters, setters). При вызове метода setDescription обновляйте значение свойства dateUpdated.
// Разработайте метод markAsDone, помечающий задачу выполненной, а также обновляющий свойства dateUpdated и dateDone.

class Task
{
    private string $description;
    private int $priority;
    private DateTime $dateCreated, $dateUpdate, $dateDone;
    private bool $isDone = false;
    private User $user;

    function __construct(string $description, int $priority)
    {
        $this->description = $description;
        $this->priority = $priority;
        $this->dateCreated = new DateTime();
    }

    public function setDescriptoin(): string
    {
        return $this->description ?? 'unknown';
    }
    public function markAsDone(){
        $this->isDone = true;
        $this->dateUpdate = new DateTime();
        $this->dateDone = $this->dateUpdate;
    }

    public function getUser(): User
    {
        return $this->user;
    }

    public function setUser(User $user): self
    {
        $this->user = $user;
        return $this;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;
        return $this;
    }

    public function getDateCreated(): DateTime
    {
        return $this->dateCreated;
    }

    public function setDateCreated(DateTime $dateCreated): self
    {
        $this->dateCreated = $dateCreated;
        return $this;
    }

    public function getDateUpdate(): DateTime
    {
        return $this->dateUpdate;
    }

    public function setDateUpdate(DateTime $dateUpdate): self
    {
        $this->dateUpdate = $dateUpdate;
        return $this;
    }

    public function getDateDone(): DateTime
    {
        return $this->dateDone;
    }

    public function setDateDone(DateTime $dateDone): self
    {
        $this->dateDone = $dateDone;
        return $this;
    }

    public function getPriority(): int
    {
        return $this->priority;
    }

    public function setPriority(int $priority): self
    {
        $this->priority = $priority;
        return $this;
    }

    public function getIsDone(): bool
    {
        return $this->isDone;
    }

    public function setIsDone(bool $isDone): self
    {
        $this->isDone = $isDone;
        return $this;
    }

}