<?php
namespace controller;

use app\Controller;
use app\Bddconnector;
use app\Renderer;
use app\Router;
use model\GetUserQuery;
use model\SkillsQuery;
use model\ToggleUserQuery;
use model\UsersQuery;


/**
 * @author David Dieu <daviddieu80@gmail.com>
 */
class SkillController extends Controller
{

    public function ListAction()
    {
        $context     = Bddconnector::getInstance();
        $skill_query = new SkillsQuery();
        $result      = $skill_query->execute($context);

        echo json_encode($result);
    }

}
