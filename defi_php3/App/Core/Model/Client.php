<?php
    namespace App\Core\Model;
    use App\Core\DB;

    class Client
    {
        private $id;
        private $nom;
        private $prenom;
        private $adresse;
        private $dateNaissance;
    
        public function getAll()
        {
            $sql = "SELECT id, nom, prenom, adresse, date_naissance
                    FROM client;";
            $sth = DB::getPDOInstance()->query($sql);
            $sth->execute();
            return $sth->fetchAll(\PDO::FETCH_ASSOC);
        }
    }