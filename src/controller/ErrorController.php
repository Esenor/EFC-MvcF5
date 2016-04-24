<?php
namespace controller;
use app\Controller;
use app\Renderer;


/**
 * @author David Dieu <daviddieu80@gmail.com>
 */
class ErrorController extends Controller
{

    public function IndexAction()
    {
        $this->render('error/404Page', ['title' => '404']);
    }

}
