<?php
namespace controller;

use core\Controller;
use model\entity\Friend;
use model\entity\FriendCollection;


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
            'page_title'      => 'Application title',
            'header_title'    => 'Friend controller'
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
    public function SayHelloAction()
    {
        $friend = new Friend($this->getUrlParam('friend'));
        $this->render('application/say-hello', ['friend' => $friend]);
    }

    public function FriendListAction() {
        $toto = new Friend('Toto');
        $tata = new Friend('tata');
        $titi = new Friend('titi');
        $tutu = new Friend('tutu');

        $crew = new FriendCollection();
        $crew->add($toto);
        $crew->add($tata);
        $crew->add($titi);
        $crew->add($tutu);

        $this->render('application/friend/list', ['friends' => $crew]);
    }
}
