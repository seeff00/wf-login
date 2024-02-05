<?php

namespace App\Repository;

use PDO;
use PDOException;

class DB
{
    protected static PDO $instance;

    /**
     * Based on Singleton pattern this function always returns a single PDO instance
     * @return PDO
     */
    public static function getInstance(): PDO
    {
        if(empty(self::$instance)) {
            try {
                $options = [
                    PDO::ATTR_EMULATE_PREPARES   => false, // turn off emulation mode for "real" prepared statements
                    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, //turn on errors in the form of exceptions
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, //make the default fetch be an associative array
                ];
                self::$instance = new PDO($_ENV['DB_DSN'], $_ENV['DB_USER'], $_ENV['DB_PASS'], $options);
            } catch(PDOException $error) {
                echo $error->getMessage();
            }
        }

        return self::$instance;
    }
}