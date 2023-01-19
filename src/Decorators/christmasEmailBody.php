<?php

namespace Tihon\Architecture\Decorators;

class christmasEmailBody extends emailBodyDecorator {

    public function loadBody() {

        echo 'This is Extra Content for Christmas<br />';

        $this->emailBody->loadBody();
    }
}
