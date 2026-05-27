Journal d'avancement:

objectif de début de séance:
résume du tp1:

-concertation sur le design du site
-répartition du travail entre membre
---------------------------------------
tp2:
 objectif de début de séance:

-coder la vue du site pour avoir un début de rendu visuelle(Théo)
-coder le Model de l'aplication(William)

(william)
méthode a coder:
    supression de jeu/ajout d'un jeu/modification d'un jeu
    affichage de l'ensemble des catégorie et genre de jeu
    detail d'une catégorie et d'un genre avec la liste de ses jeux
    affichage des détail d'un jeu

travail réaliser:

méthode coder:
    deletegame($id)
    addgame($game)
    getGame($id)
    listCategorieGenre()
    infoJeu()
    TriJeu()

methode non-realiser:
    detailcCatégorieGenre()
    je ne l'ai pas réaliser cette séance car il faut encore que je voie comment organiser la requete
    parceque ça va surtout dépendre du clic de l'utilisateur donc peut etre qui faudra enfaite créer 2 méthode distincte
    et les appeler en fonction du choix de l'utilisateur (genre ou catégorie).

Utilisation de l'ia:
    question sur la construction des methode et le stockage de varaible.

prompt: parceque la dans l'autre façon de faire "query builder" j'ai limpression qu'on stock les resultat regarde: public function deletegame($id){
$this->db->delete('game',['id'=>$id]);
} ou peut etre que je me trompe 

résumer de la réponses:
c'est le controleur qui stock les variables.
('game',['id'=>$id]) c'est juste une identification de l'attribut pour supprimer,il n'y a pas de variable stocker.


(Théo)


Maquette d'une vue. 

Ajout de lien non fonctionnelle pour l'instant : 

-Ajout d'un jeu
-barre de recherche
-un bouton d'envoi
-modifier un jeu
-supprimer un jeu
-option de tri (Les 2 tris par date et par nom par ce que on ne sait pas encore lequelle choisir)

Batail avec git mais fonctionne au final.
