<?php
namespace model;

use app\Querycustom;

/**
 * @author David Dieu <daviddieu80@gmail.com>
 */
class UserQuery extends Querycustom
{

    public function __construct()
    {
        $query = "Select id, login, password from user";
        parent::__construct($query);
    }
}
