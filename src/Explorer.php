<?php

namespace Tihon\Architecture\Explorer;

use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;
use SplFileInfo;

class Explorer
{
    private string $currentPath = '';

    private function getPathArray($path): array
    {
        $array = [];
        $objects = new RecursiveDirectoryIterator($path);
        foreach ($objects as $object) {
            $name = $object->getFilename();
            $array[$object->getPathname()] = $name;
        }
        return $array;
    }

    public function printDirContent($dir): void
    {
        $this->currentPath = $this->currentPath ? $this->currentPath .= DIRECTORY_SEPARATOR . $dir : $dir;
        $array = $this->getPathArray($this->currentPath);
        foreach ($array as $item) {
            echo $item . PHP_EOL;
        }
    }
}