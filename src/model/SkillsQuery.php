<?php
namespace model;

use app\Querycustom;

/**
 * @author David Dieu <daviddieu80@gmail.com>
 */
class SkillsQuery extends Querycustom
{

    public function __construct()
    {
        $query = "Select id, name, lvl from skill";
        parent::__construct($query);
    }
}
