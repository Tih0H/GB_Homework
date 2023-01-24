<?php

namespace Tihon\Architecture\Services;


use Tihon\Architecture\Interfaces\PayableInterface;
use Tihon\Architecture\Interfaces\PaymentInterface;

class PaymentService
{
    private PaymentInterface $paymentService;

    public function __construct(PaymentInterface $paymentService)
    {
        $this->paymentService = $paymentService;
    }

    public function makePayment(PayableInterface $payable): void
    {
        $this->paymentService->pay($payable->getTotalAmount(), $payable->getClientPhone());
    }

    public function setPaymentMethod(PaymentInterface $paymentService): self
    {
        $this->paymentService = $paymentService;
        return $this;
    }
}