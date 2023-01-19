<?php

namespace Tihon\Architecture\Decorators;

class newYearEmailBody extends emailBodyDecorator {

    public function loadBody() {

        echo 'This is Extra Content for New Year.<br />';

        $this->emailBody->loadBody();
    }
}
