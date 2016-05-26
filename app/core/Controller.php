<?php
namespace core;


/**
 * @author David Dieu <daviddieu80@gmail.com>
 */
abstract class Controller
{
    /**
     * @var array
     */
    private $url_params;

    /**
     * Controller constructor.
     */
    public function __construct($url_params)
    {
        $this->url_params = $url_params;
    }

    /**
     * @return array
     */
    protected function requireParams()
    {
        return array();
    }

    /**
     * @param string $view
     * @param array  $params
     */
    protected function render($view, $params)
    {
        $params = array_merge($this->requireParams(), $params);
        new Renderer('' . $view, $params);
    }

    /**
     * @param string $name
     * @param string $params
     * @param bool   $critical
     *
     * @return string
     * @throws \Exception
     */
    protected function getUrlParam($name, $critical_needed = true)
    {
        if (array_key_exists($name, $this->url_params)) {
            return $this->url_params[$name];
        } else {
            if ($critical_needed) {
                throw new \Exception("Param $name not found");
            } else {
                return '';
            }
        }
    }
}
