<?php

namespace Tihon\Lesson1\Http\Actions;

use Tihon\Lesson1\http\Request;
use Tihon\Lesson1\http\Response;

interface ActionInterface
{
    public function handle(Request $request): Response;
}