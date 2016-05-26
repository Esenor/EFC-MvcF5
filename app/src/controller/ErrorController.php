<?php
namespace controller;

use core\Controller;
use core\Renderer;


/**
 * @author David Dieu <daviddieu80@gmail.com>
 */
class ErrorController extends Controller
{
    /**
     *
     */
    public function IndexAction()
    {
        $this->render(
            'error/404Page',
            [
                'page_title'      => 'Error 404',
                'header_title'    => 'Error',
                'header_subtitle' => '404 error'
            ]
        );
    }

}
