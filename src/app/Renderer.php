<?php
namespace app;

/**
 * @author David Dieu <daviddieu80@gmail.com>
 */
class Renderer
{
    /**
     * @var array
     */
    public $params;

    /**
     * Renderer constructor.
     *
     * @param string $view
     * @param array  $params
     */
    public function __construct($view, $params)
    {
        $require_params = [
            'error'   => null,
            'success' => null,
            'info'    => null
        ];

        $this->params = array_merge($require_params, $params);

        $filepath = ROOT . 'view' . DIRECTORY_SEPARATOR . $view;
        if (file_exists($filepath . '.php')) {
            require_once $filepath . '.php';
        } elseif (file_exists($filepath . '.html')) {
            require_once $filepath . '.html';
        } else {
            throw new \Exception("View: $view not found");
        }
    }

    /**
     * @param string $name
     *
     * @return mixed
     * @throws Exception
     */
    public function __get($name)
    {
        if (key_exists($name, $this->params)) {
            return $this->params[$name];
        } else {
            throw new Exception("$name not found");
        }
    }
}
