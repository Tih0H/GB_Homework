<?php

namespace App\Services\Contracts;

interface Parser
{
    /**
     * @param string $link
     * @return Parser
     */
    public function setLink(string $link): self;

    /**
     * @return array
     */
    public function getParseData(): array;
    public function saveParseDataToDb(): void;
}
