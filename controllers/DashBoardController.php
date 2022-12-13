<?php

namespace app\controllers;

use app\core\Controller;

class DashBoardController extends Controller
{
    public static function getpharmacydashboard()
    {


        return self::render('pharmacy-dashboard');

    }


}


