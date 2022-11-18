<?php

namespace sm\controllers;

use sm\Controller;
use sm\Response;

class SiteController extends Controller
{
    public function default(): Response
    {
        return $this->createTextResponse('Hejka na naszym super frameworku!');
    }

    public function error(string $errorMessage): Response
    {
        return $this->createResponse('views/site_error.php', [
            'errorMessage' => $errorMessage
        ]);
    }
}