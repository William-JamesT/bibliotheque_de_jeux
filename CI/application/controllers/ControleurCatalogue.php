<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ControleurCatalogue extends CI_Controller {

    // ---------------------------------------------------------
    // LE CONSTRUCTEUR
    // ---------------------------------------------------------
    public function __construct() {
        parent::__construct();
        // On charge le Modèle qui gère le catalogue de jeu
        $this->load->model('Model');
    }

    /*
    methode  donnant accès au détail d'une catégorie et d'un genre avec
    la liste de ses jeux
    */

    public function ListCG(){
        //partie appelle de fonction dans un premier temps
        $ListeCategorie = $this->Model->ListCategory();
        $ListeGenre= $this->Model->ListGenre();

        /*préparation des données pour la vue dans un second temps
         c'est le principe du dictionnaire clé valeur qu'on a vue en NSI au lycée
         ce qu'on met entre guillmet est la clé,c'est ce qu'on va utiliser dans la vue 
         pour récuperer les données*/

        $GenreEtCategorie= [
            'Liste_Genre' => $ListeGenre,
            'Liste_Categorie' => $ListeCategorie
        ];


        //ensuite on va charger la vu qui va afficher ces informations
        /*ne prend que 2 argument donc on est forcément obliger de stocker 
        toutes les données meme si elle ne sont pas issus de la meme methode
        dans un meme dictionaire*/

        $this->load->view('CategorieGenre',$GenreEtCategorie);

    }

    public function AffichageJeuCategorie($CategorieId){

        $CategorieJeux= $this->Model->InfoCategorie($CategorieId);

        $CatalogueDeJeux= [
            /*il y a aussi le nom de la categorie dedans représenter
             par le nom description. La phase de recupération des données
             se passe dans la vue pas ici*/
            'Liste_Jeu'=>$CategorieJeux
        ];
        
        $this->load->view('ListeJeux',$CatalogueDeJeux);
    }


    public function AffichageJeuGenre($GenreId){

        $CategorieJeu= $this->Model->Infogenre($GenreId);

        $CatalogueDeJeux= [
            /*il y a aussi le nom de la categorie dedans représenter
             par le nom description. La phase de recupération des données
             se passe dans la vue pas ici*/
            'Liste_Jeu'=>$CategorieJeu
        ];
        
        $this->load->view('ListeJeux',$CatalogueDeJeux);
    }

    public function DetailsJeu($JeuId){

        $DetailsJeu= $this->Model->infojeu($JeuId);

        $InfoJeu= [
            'information'=>$DetailsJeu
        ];

        $this->load->view('PageJeu',$InfoJeu);
    }
}