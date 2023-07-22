<?php
/**
 * @author Amin Mahmoudi (MasterkinG)
 * @copyright    Copyright (c) 2019 - 2021, MasterkinG32. (https://masterking32.com)
 * @link    https://masterking32.com
 * @Description : It's not masterking32 framework !
 **/

use Medoo\Medoo;

class database
{
    public static $auth;
    public static $chars;

    public static function db_connect()
    {
        self::$auth = new Medoo([
            'database_type' => 'mysql',
            'database_name' => 'acore_auth',
            'server' => '127.0.0.1', // Change this to your MySQL server address if it's not running locally.
            'username' => 'acore',    // Change this to your MySQL username.
            'password' => 'acore',        // Leave this empty if you're using 'root' user without a password.
            'charset' => 'utf8',
            'collation' => 'utf8_general_ci',
            'port' => '3306'
        ]);

        foreach (get_config("realmlists") as $realm) {
            if (!empty($realm["realmid"]) && !empty($realm["db_host"]) && !empty($realm["db_port"]) && !empty($realm["db_user"]) && !empty($realm["db_pass"]) && !empty($realm["db_name"])) {
                self::$chars[$realm["realmid"]] = new Medoo([
                    'database_type' => 'mysql',
                    'database_name' => $realm["db_name"],
                    'server' => $realm["db_host"],
                    'username' => $realm["db_user"],
                    'password' => $realm["db_pass"],
                    'charset' => 'utf8',
                    'collation' => 'utf8_general_ci',
                    'port' => $realm["db_port"]
                ]);
            } else {
                die("Missing char database required field.");
            }
        }
    }
}