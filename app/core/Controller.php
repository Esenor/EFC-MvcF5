<?php
namespace core;


/**
 * @author David Dieu <daviddieu80@gmail.com>
 */
abstract class Controller
{
    /**
     * Controller constructor.
     */
    public function __construct()
    {
    }

    protected function requireParams() {
        return array();
    }

    /**
     * @param string $view
     * @param array  $params
     */
    protected function render($view, $params)
    {
        $params   = array_merge($this->requireParams(), $params);
        new Renderer('' . $view, $params);
    }
}
