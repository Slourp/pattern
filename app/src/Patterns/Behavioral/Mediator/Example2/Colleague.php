<?php

namespace App\Patterns\Behavioral\Mediator\Example2;

interface Colleague
{
    public function setMediator(Mediator $mediator): void;
}
