<?php

namespace Tihon\Architecture\Decorators;

use Tihon\Architecture\Interfaces\eMailBody;

abstract class emailBodyDecorator implements eMailBody {

    protected $emailBody;

    public function __construct(eMailBody $emailBody) {

        $this->emailBody = $emailBody;

    }

    abstract public function loadBody();
}
