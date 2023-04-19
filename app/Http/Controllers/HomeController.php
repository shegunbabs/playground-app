<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;

class HomeController
{

    public function __invoke(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $appList = [
            [
                "title" => "Tutor Demo for JetBrains License",
                "description" => "Full website for Capitalsage Tech School",
                "href" => \route("academy.home"),
            ],
            [
                "title" => "Merge institution & Bank Codes",
                "description" => "Method to merge Institution & Bank Codes",
                "href" => "/process-bank-codes",
            ],
            [
                "title" => "API Backend Demos",
                "description" => "API implementation of some partners",
                "href" => "#",
            ]
        ];
        return view('welcome', ["appList" => $appList]);
    }
}
