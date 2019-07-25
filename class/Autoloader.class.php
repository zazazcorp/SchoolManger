<?php

/**
 * Classe  Autoloader.
 * Chargement automatique des classes dans les fichiers.
 * Utilise la fonction spl_autoload_register()
 *
 * @version 1.0
 * @author zcorp
 */

class Autoloader
{
    /**
     * @param $class class , inclut la classe demandée et formate le chemin
     * 
     */
    static function mon_autoload($class)
    {
        require __DIR__ . '/' . $class . '.class.php';
    }

    /**
     * Chargement dynamique des classes
     */
    static function register()
    {
        spl_autoload_register(array(__CLASS__, 'mon_autoload'));
    }
}