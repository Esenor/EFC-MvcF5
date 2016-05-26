<?php
namespace controller;

use core\Controller;


/**
 * @author David Dieu <daviddieu80@gmail.com>
 */
class ApplicationController extends Controller
{
    /**
     * @return array
     */
    protected function requireParams()
    {
        $require_params = [
          'header_subtitle' => '',
          'page_title' => 'Application title'
        ];
        return $require_params;
    }

    /**
     *
     */
    public function IndexAction()
    {
        $this->render(
            'application/index',
            [
                'header_title'    => 'MvcF5',
                'header_subtitle' => 'Juste a little web application'
            ]
        );
    }

    /**
     * @param array $params
     *
     * @throws \Exception
     */
    public function SayHelloAction($params)
    {
        $friend = '';
        if (array_key_exists('friend', $params)) {
            $friend = $params['friend'];
        } else {
            throw new \Exception('I have no friend :-(');
        }
        $this->render(
            'application/say-hello',
            [
                'header_title'  => 'Hello my friend',
                'friend' => $friend
            ]
        );
    }
}
