<?php
namespace model;

use app\Querycustom;

/**
 * @author David Dieu <daviddieu80@gmail.com>
 */
class GetUserQuery extends Querycustom
{

    public function __construct($id)
    {
        if (!is_integer($id)) {
            throw new Exception('ID is not an integer.');
        }
        $query = "Select id, login, password from user where id = $id";
        parent::__construct($query);
    }
}
