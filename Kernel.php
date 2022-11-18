<?php

namespace sm;

use PDO;
use PDOException;
use sm\controllers\SiteController;
use sm\exceptions\HttpException;
use sm\exceptions\NotFoundHttpException;

class Kernel
{
    private array $config;
    private Request $request;
    private \PDO $pdo;

    public function __construct(array $config)
    {
        $this->config = $config;
        $this->initDatabase();
    }

    public function run(): void
    {
        $this->request = new Request();
        $this->createControllerAndRun();
    }

    public function getRequest(): Request
    {
        return $this->request;
    }

    private function createControllerAndRun(): void
    {
        $routes = array_keys($this->config['routes']);
        $lookingRoute = $this->request->get('r');
        if (in_array($this->request->get('r'), $routes)) {
            $controllerName = $this->config['routes'][$lookingRoute]['class'];
            /** @var Controller $controller */
            $controller = new $controllerName;
            $controller->setRequest($this->request);


            $method = $this->config['routes'][$lookingRoute]['method'];
            /** @var Response $response */
            try {
                $response = $controller->$method();
                echo $response->getContent();
            } catch (HttpException $e) {
                $controller = new SiteController();
                $response = $controller->error($e->getMessage());
                echo $response->getContent();
            }
        } else {
            $controller = new SiteController();
            $response = $controller->default();
            echo $response->getContent();
        }
    }

    private function initDatabase(): void
    {
        $dsn = "mysql:host=127.0.0.1;dbname=db;charset=UTF8";

        try {
            $this->pdo = new PDO($dsn, 'user', 'user');
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}