<?php

use Tihon\Architecture\Models\Vacancy;
use Tihon\Architecture\Models\Applicant;
use Tihon\Architecture\Models\Order;
use Tihon\Architecture\Services\QiwiService;
use Tihon\Architecture\Services\WebMoneyService;
use Tihon\Architecture\Services\YandexService;
use Tihon\Architecture\Services\PaymentService;


spl_autoload_register('load');

function load($className): void
{
    var_dump($className);
    $file = $className . ".php";
    $nameSpace = "Tihon\Architecture";
    $file = str_replace($nameSpace, "src", $file);
    $file = str_replace("\\", "/", $file);
    $file = str_replace("_", "/", $file);
    if (file_exists($file)) {
        var_dump($file);
        include $file;
    }
};

$applicant1 = new Applicant('Федор Крылов', 'fedya@example.com', 3);
$applicant2 = new Applicant('Иван Иванов', 'ivan@example.com', 3);
$applicant3 = new Applicant('Рус Сказкин', 'skazkin@mail.com', 5);

$vacancy = new Vacancy('HandHunter.gb');
$vacancy->attach($applicant1);
$vacancy->attach($applicant2);
$vacancy->attach($applicant3);
$vacancy->addVacancy('Первая вакансия');

echo '__________________' . PHP_EOL;

$vacancy->detach($applicant3);
$vacancy->addVacancy('Вторая вакансия');

//------------------------------------------------------------------------------------------------------------

$order1 = new Order(1200, '676-43-23');
$order2 = new Order(124.53, '234-12-56');
$order3 = new Order(12433.00, '234-12-56');

$service = new PaymentService(new QiwiService());
$service->makePayment($order1);
$service->setPaymentMethod(new YandexService())->makePayment($order2);
$service->setPaymentMethod(new WebMoneyService())->makePayment($order3);
