<?php
/**
 * @author Jan Černý
 * class Loader
 */
class Loader
{
    public static function load_index(string $className)
    {
        require_once ("conf.php");
        if (file_exists(INDEX_DIR . "$className.php")) {
            require INDEX_DIR . "$className.php";
        } else {
            die("Unable to load class $className.");
        }
    }

    public static function load_php(string $className)
    {
        require_once ("conf.php");
        if (file_exists(PHP_DIR . "$className.php")) {
            require PHP_DIR . "$className.php";
        } else {
            die("Unable to load class $className.");
        }
    }
}
?>