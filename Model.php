<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_todo extends CI_Model {


/* Nuance dans la création des méthode
Questionnement: pourquoi sur certaine méthode comme le delete
donne l'impression de stocker le resultat de la requete sql comment ça se passe réelement?

explication rappel de gemmini:

1. Les Ordres (INSERT, UPDATE, DELETE) = Pas besoin de return
Quand tu utilises la méthode deletegame, tu donnes un ordre sec à la base de données : "Supprime ce jeu".

Pourquoi on ne stocke rien ? Parce qu'il n'y a rien à stocker ni à renvoyer ! Le jeu a disparu de la base de données. Le Contrôleur n'a pas besoin de 
récupérer des informations, il voulait juste que le travail soit fait. La méthode s'arrête là.


2. Les Questions (SELECT) = Obligation d'utiliser return
Ta méthode listCategorieGenre() est une question posée à la base de données : "Quelles sont les catégories ?".

Pourquoi on utilise return ? Si tu n'utilises pas return, la base de données va bien chercher les catégories, mais le Modèle va les garder bloquées dans son "tuyau". 
Le return agit comme un livreur : 
il prend les résultats sortis de la base de données et les expédie directement au Contrôleur. Il ne les "stocke" pas de manière permanente.

*/
	public function __construct()
	{
		$this->load->database();
	}
//-------------------------------------------
//Methode d'action sur la database

    public function deletegame($id){
		$this->db->delete('game',['id'=>$id]);
	}


	public function addgame($game)
	{
		$this->db->insert('game', $game);
		return $this
			->db
			->insert_id();
	}

    /*manque la methode modifier*/



//-----------------------------------------------
//partie info-jeu etc....
	public function getGame($id){
		$sql= "SELECT * FROM game where id= ?";
		return $this->db->query
	}


    public function listCategorieGenre(){

        $sql="SELECT genreid,categoryid
            FROM game_category NATURAL JOIN game_genre";
            return $this->db->query($sql)->result();
    }

    public function infoJeu(){

        $sql="SELECT name,releaseYear,shortDescription,genreid,categoryid
            FROM game_category NATURAL JOIN game NATURAL JOIN game_genre";
            return $this->db->query($sql)->result();
    }

    public function TriJeu(){

        $sql="SELECT name,releaseYear
            FROM game
            ORDER BY titre ASC";
            return $this->db->query($sql)->result();
    }

}