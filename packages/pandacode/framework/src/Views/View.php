<?php

namespace Petrenko\Framework\Views;



/**
 * / * author
 */
class View
{
    /**
     * @var array
     */
    public array $route = [];
    /**
     * @var string
     */
    public string $viewPath;

    /**
     * @param array $route
     * @param string $viewPath
     */
    public function __construct(array $route, string $viewPath = '')
    {
        $this->route = $route;
        $this->viewPath = $viewPath;
    }

    /**
     * @param $data
     * @return void
     */
    public function render($data): void
    {
        if (!is_array($data)) {
            echo '<h1>Ошибка данных для генерации шаблона<h1>';
            return;
        }

        extract($data, EXTR_OVERWRITE);

        $fileView = ROOT . '/App/Views/' . $this->viewPath . '.php';
        ob_start();

        if (is_file($fileView)) {
            require $fileView;
        } else {
            echo '<h1>Файл не найден' . $fileView . '<h1>';

        }
        $content = ob_get_clean();
        $fileLayout = ROOT . '/App/Views/layouts/' . 'default' . '.php';
        if (is_file($fileLayout)) {
            require $fileLayout;
        } else {
            echo '<h1>Файл ШАБЛОНА не найден' . $fileView . '<h1>';
        }

    }
}