<?php
namespace model;

use app\Querycustom;

/**
 * @author David Dieu <daviddieu80@gmail.com>
 */
class ToggleUserQuery extends Querycustom
{

    public function __construct($id)
    {
        if (!is_integer($id)) {
            throw new \Exception('ID is not an integer.');
        }
        $query = "Update user set activated = not activated where id = $id";
        parent::__construct($query);
    }
}
