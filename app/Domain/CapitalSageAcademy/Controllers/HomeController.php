<?php

namespace App\Domain\CapitalSageAcademy\Controllers;

class HomeController
{

    public function __invoke()
    {
        return view("capitalsage-academy.index");
    }
}
