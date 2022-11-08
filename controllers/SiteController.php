<?php

namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\core\Request;

class SiteController extends Controller
{
    public static function home(): array|bool|string
    {
        $params = [
            'name' => "Aura Community Health Net"
        ];
        return self::render('home', $params);
    }

    public static function contact(): array|bool|string
    {
        return self::render('contact');
    }

    public static function handleContact(Request $request): string
    {
        $body = $request->getBody();
        return 'Hadling submitted data';
    }
}