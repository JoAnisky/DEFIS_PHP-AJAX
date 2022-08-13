<?php
// Permet de récupérer l'objet contenu dans DB.php
require_once 'vendor/autoload.php';

use App\Core\Model\Client;

$client = new Client();
$client = $client->getAll();

$verif = var_dump($client);
echo json_encode($verif);