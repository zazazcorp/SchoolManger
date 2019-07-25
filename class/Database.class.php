<?php

/**
 * Classe  Database.
 * classe de connexion à la base de données et initialisation du drivers.
 * Utilise PDO comme PHP Data Object
 *
 * @version 1.0
 * @author zcorp
 */
class Datebase
{
    /* 
     *@var array()
     * le tableau dans lequel vont se greffer les données de config de la base de données
     */
    private $data;

    /*
     * @var string PDO statement 
     */
    private $pdo;

    /* 
     *@param array() $db_config qui est le tableau de config de la BD dans le fichier  ../config/db_config.php
     *
     */
    public function __construct($do = array())
    {
        $this->data = $do;
    }
    

    /* 
     * @return PDO object 
     */
    private function getPDO()
    {
        /* 
         * Verification si l'objet PDO est pas encore appelé 
         */
        if ($this->pdo === null)
        {
            $con = new PDO(
                $this->data['DB_DSN'],
                $this->data['DB_USER'],
                $this->data['DB_PASSWORD'],
                array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)
            );

            $this->pdo = $con;

        }

        return $this->pdo;

    }


    /*
     * @param $stat string , la requette à executer
     * @return les objets de la requette  
     */
    public function requette($query, $class)
    {
       $resultat = $this->getPDO()->query($query);
       $donne = $resultat->fetchAll(PDO::FETCH_CLASS, $class);
       return $donne;
    }


    /*
     * @param $query string , la requette à executer
     * 
     */
    public function inserrer($query, $data)
    {
       $this->getPDO()->prepare($query)->execute($data);
        //$pdo->prepare($sql)->execute([$name, $surname, $sex]);

      
    }

}
