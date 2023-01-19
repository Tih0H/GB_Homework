<?php

namespace Tihon\Architecture\Services;

use Tihon\Architecture\Interfaces\eMailBody;

class eMail implements eMailBody {

    public function loadBody() {

        echo "This is Main Email body.<br />";

    }
}
