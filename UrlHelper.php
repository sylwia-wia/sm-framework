<?php

namespace sm;

class UrlHelper
{

    public static function createUrl(string $controller, string $action, array $params = [])
    {
        $queryString = '';
        foreach ($params as $param => $value) {
            $queryString .= '&' . $param . '=' . $value;
        }

        return '/framework/index.php?r=' . $controller . '/' . $action . $queryString;
    }
}