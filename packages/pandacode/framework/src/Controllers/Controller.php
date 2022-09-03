<?php

namespace Petrenko\Framework\Controllers;

use Petrenko\Framework\Views\View;

/* @ author Denys Petrenko < Des . Petrenko @ gmail . com >
 */
abstract class Controller
{
    /**
     * @var array
     */
    public array $route = [];

    /**
     * @var array
     */
    public $data = [];

    /**
     * @param $route
     */
    public function __construct($route)
    {
        $this->route = $route;
    }

    /**
     * @param string $view
     * @param array $data
     * @return bool
     */
    public function view(string $view, array $data = []): bool
    {
        $viewObject = new View($this->route, $view);
        if (!empty($this->data)) {
            $data = array_merge($data, $this->data);
        }
        $viewObject->render($this->data);
        return true;
    }

    public function setTitle($data)
    {
        $this->data = $data;
    }

}

