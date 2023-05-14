<?php

namespace App\Patterns\Behavioral\Mediator\Example2;

interface Mediator
{
    public function notify(Colleague $sender, string $event): void;
}
