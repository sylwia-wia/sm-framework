<?php

namespace sm;

abstract class Controller
{
    protected Request $request;

    public function setRequest(Request $request): void
    {
        $this->request = $request;
    }

    protected function createResponse(string $filePath, array $parameters = []): Response
    {
        ob_start();
        extract($parameters);

        include 'views/layout.php';
        $layoutPackaged = ob_get_clean();

        return $this->createTextResponse($layoutPackaged);
    }

    protected function createTextResponse(string $content): Response
    {
        $response = new Response();
        $response->setContent($content);

        return $response;
    }

    protected function redirect(array|string $url): void
    {
        if (is_array($url)) {
            $url = UrlHelper::createUrl($url[0], $url[1]);
        }

        header('Location: ' . $url);
    }

}
