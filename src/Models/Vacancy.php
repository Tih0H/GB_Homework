<?php

namespace Tihon\Architecture\Models;

use SplObserver;
use SplSubject;

class Vacancy implements SplSubject
{
    private $name;
    private $observers = array();
    private $content;

    public function __construct($name)
    {
        $this->name = $name;
    }

    //add observer
    public function attach(SplObserver $observer): void
    {
        $this->observers[] = $observer;
    }

    //remove observer
    public function detach(SplObserver $observer): void
    {

        $key = array_search($observer, $this->observers, true);
        if ($key) {
            unset($this->observers[$key]);
        }
    }

    //set breakouts news
    public function addVacancy($content)
    {
        $this->content = $content;
        $this->notify();
    }

    public function getContent()
    {
        return $this->content . " ({$this->name})";
    }

    //notify observers(or some of them)
    public function notify(): void
    {
        foreach ($this->observers as $value) {
            $value->update($this);
        }
    }
}