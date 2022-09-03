<?php

namespace App\Controllers;

use Petrenko\Framework\Route;

class MainController extends BaseController
{
    public function index()
    {
        echo "<h1>Home page will be here</h1>";
        echo "<h3>Routes list:</h3>";
        foreach (Route::gerRoutes() as $pattern => $route) {
            if (!str_contains($pattern, '$')) {
                echo '<a target="_blank" href="' . $pattern . '">' . $route[1] . '</a><br />';
            }
        }
    }
}