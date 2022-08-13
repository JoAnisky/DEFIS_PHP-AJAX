<?php
    // Définit l'espace de nom
    namespace App\Core;

    class DB
    {
        const HOST = 'localhost';
        const DATABASE = 'test';
        const USER = 'root';
        const PASSWORD = 'anisky4mysql';
        private static $PDOInstance = null;
        private $instance = null;

        public function __construct()
        {
            $this->instance = new \PDO('mysql:host='.self::HOST.';dbname='.self::DATABASE.';',self::USER,self::PASSWORD);
        }

        public static function getPDOInstance()
        {
            if(is_null(self::$PDOInstance)){
                self::$PDOInstance = new DB();
            }
            return self::$PDOInstance;
        }

        public function query($sql)
        {
            return $this->instance->prepare($sql);
        }
        // public function __construct(){
        //     $this->getDB();
        // }
        
        // function getDB(){
        //     //  self:: fait référence à la constante créée dans la classe
        //     $conn = new \PDO('mysql:host='.self::HOST.';dbname='.self::DATABASE.';',self::USER, self::PASSWORD);
        //     // return obligatoire pour retourner la donnée
        //     $this->db = $conn;
        // }
    }