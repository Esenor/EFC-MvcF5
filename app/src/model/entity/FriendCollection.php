<?php

namespace model\entity;

/**
 * @author David Dieu <daviddieu80@gmail.com>
 */
class FriendCollection
{
    /**
     * @var array
     */
    private $friends;

    /**
     * @param Friend $friend
     */
    public function add(Friend $friend) {
        $this->friends[] = $friend;
    }

    /**
     * @return array
     */
    public function getAll() {
        return $this->friends;
    }
}
