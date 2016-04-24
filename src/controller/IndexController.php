<?php
namespace controller;

use app\Controller;
use app\Bddconnector;
use app\Renderer;
use app\Router;
use model\GetUserQuery;
use model\ToggleUserQuery;
use model\UsersQuery;


/**
 * @author David Dieu <daviddieu80@gmail.com>
 */
class IndexController extends Controller
{

    public function IndexAction()
    {
        $context   = Bddconnector::getInstance();
        $queryUser = new UsersQuery();
        $params    = $queryUser->execute($context);

        $this->render('IndexPage', ['users' => $params, 'title' => 'MVC Index']);
    }

    public function UserAction($params)
    {
        $id = 0;
        if (array_key_exists('id', $params)) {
            $id = intval($params['id']);
        } else {
            throw new \Exception('Param user_id not found');
        }

        $context     = Bddconnector::getInstance();
        $user_query  = new GetUserQuery($id);
        $user_result = $user_query->execute($context);
        if (count($user_result) == 0) {
            $error = new ErrorController();
            $error->IndexAction();
        } else {
            $user = $user_result[0];
            $this->render('user/user', ['user' => $user]);
        }
    }

    /**
     * @param $params
     *
     * @throws \Exception
     */
    public function AjaxUserToggleAction($params)
    {
        $id = 0;
        if (array_key_exists('id', $params)) {
            $id = intval($params['id']);
        } else {
            throw new \Exception('Param user_id not found');
        }

        $context      = Bddconnector::getInstance();
        $enable_query = new ToggleUserQuery($id);
        $enable_query->executeWithNoResult($context);
    }

}
