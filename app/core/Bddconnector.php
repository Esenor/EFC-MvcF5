<?php
namespace core;

/**
 * @author David Dieu <daviddieu80@gmail.com>
 */
class BddConnector
{
    /**
     * @var PDO context de la bdd
     */
    private static $bddconnector = null;

    /**
     * @return PDO
     */
    public static function getInstance()
    {
        if (is_null(Bddconnector::$bddconnector)) {
            try {
                Bddconnector::$bddconnector = new \PDO('mysql:host=localhost;dbname=pdo', 'root', '');
            } catch (Exception $e) {
                echo $e->getMessage();
                exit();
            }
        }

        return Bddconnector::$bddconnector;
    }

}
