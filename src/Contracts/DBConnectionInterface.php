<?php

namespace Tihon\Architecture\Contracts;

interface DBConnectionInterface
{
    public function connectionStatus();

    public function closeConnection();
}