<?php
namespace model;

use app\Querycustom;

/**
 * @author David Dieu <daviddieu80@gmail.com>
 */
class UsersQuery extends Querycustom
{

    public function __construct()
    {
        $query = "Select id, login, password, activated from user";
        parent::__construct($query);
    }
}
