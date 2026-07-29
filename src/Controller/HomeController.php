<?php

declare(strict_types=1);

namespace App\Controller;

use App\View;

final class HomeController
{
    public function index(): void
    {
        View::render('home');
    }
}
