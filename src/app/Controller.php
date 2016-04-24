<?php
namespace app;


/**
 * @author David Dieu <daviddieu80@gmail.com>
 */
abstract class Controller
{
    /**
     * @param string $view
     * @param array  $params
     */
    protected function render($view, $params)
    {
        new Renderer('' . $view, $params);
    }
}
