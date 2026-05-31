<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model extends CI_Model {


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

    public function ListCategory(){
        $sql="SELECT description,id
              FROM category";

        return $this->db->query($sql)->result();
    }

    public function ListGenre(){
            $sql="SELECT description,id
                  FROM genre";

        return $this->db->query($sql)->result();
    }

    public function InfoCategorie($categoryId){

        $sql="SELECT c.description,g.id,g.name,g.releaseYear
              FROM game g JOIN game_category gc ON g.id=gc.gameId
              JOIN category c ON gc.categoryId=c.id
              Where gc.categoryId=? ";

            return $this->db->query($sql,[$categoryId])->result();
    }

    public function Infogenre($genreId){
        $sql="SELECT ge.description,g.id,g.name,g.releaseYear
            FROM game g JOIN game_genre gg ON g.id=gg.gameId
            JOIN genre ge ON gg.genreId = ge.id
            Where gg.genreId=? ";

            return $this->db->query($sql,[$genreId])->result();
    }

    public function infoJeu($JeuId){
            $sql="SELECT g.id,g.name,g.releaseYear,g.shortDescription,ge.id,c.id,p.jpeg,d.name
            FROM game g JOIN game_genre gg ON g.id=gg.gameId
            JOIN game_category gc ON g.id = gc.gameId
            JOIN category c ON gc.categoryId = c.id
            JOIN developer d ON d.id = g.developerId
            JOIN genre ge ON gg.genreId=ge.id
            JOIN poster p ON p.id = g.posterId
            Where g.id=?";
            
            return $this->db->query($sql,[$JeuId])->result();
    }


    
    public function TriJeu(){

        $sql="SELECT name,releaseYear
            FROM game
            ORDER BY titre ASC";

            return $this->db->query($sql)->result();
    }


}