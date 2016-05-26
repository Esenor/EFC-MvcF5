<?php

/**
 * @author David Dieu <daviddieu80@gmail.com>
 */
abstract class Approutes
{
    /**
     * @return array
     */
    public static function getRoutes()
    {
        return array(
            '/'                  => array('Controller' => 'Application', 'Action' => 'Index'),
            '/sayhello/:friend' => array('Controller' => 'Application', 'Action' => 'SayHello'),
        );
    }
}