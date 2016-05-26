<?php
namespace core;

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
     * @var string
     */
    private $view;

    /**
     * Renderer constructor.
     *
     * @param string $view
     * @param array  $params
     * @param string $layout
     */
    public function __construct($view, $params, $layout = 'default')
    {
        $this->view     = $view;
        $require_params = [
            'error'   => null,
            'success' => null,
            'info'    => null
        ];
        $this->params   = array_merge($require_params, $params);
        $this->requireFile('layout' . DIRECTORY_SEPARATOR . $layout);
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
            return $name . ' not found';
        }
    }

    /**
     * @param string $path
     *
     * @return string
     * @throws \Exception
     */
    private function requireFile($path)
    {
        $filepath = ROOT . 'view' . DIRECTORY_SEPARATOR . $path . '.phtml';
        if (file_exists($filepath)) {
            require_once $filepath;
        } else {
            throw new \Exception("File: $filepath not found");
        }
    }

    /**
     * @throws \Exception
     */
    public function renderContent()
    {
        $this->requireFile($this->view);
    }

    /**
     * @param $path
     *
     * @throws \Exception
     */
    public function renderChild($path)
    {
        $this->requireFile($path);
    }
}
