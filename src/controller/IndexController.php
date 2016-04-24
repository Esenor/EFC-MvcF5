<?php
namespace controller;

use app\Controller;
use app\Bddconnector;
use model\UserQuery;
use app\Renderer;


/**
 * @author David Dieu <daviddieu80@gmail.com>
 */
class IndexController extends Controller
{

    public function IndexAction()
    {
        $context   = Bddconnector::getInstance();
        $queryUser = new UserQuery();
        $params    = $queryUser->execute($context);

        $this->render('IndexPage', ['users' => $params, 'title' => 'MVC Index']);
    }

    public function AzertyAction()
    {
        $this->render('test/toto', []);
    }
}
