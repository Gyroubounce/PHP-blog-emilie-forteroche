<?php 

class ArticleController 
{
    /**
     * Affiche la page d'accueil.
     * @return void
     */
    public function showHome() : void
    {
        $articleManager = new ArticleManager();
        $articles = $articleManager->getAllArticles();

        $view = new View("Accueil");
        $view->render("home", ['articles' => $articles]);
    }

    /**
     * Affiche le détail d'un article.
     * @return void
     */
    public function showArticle() : void
    {
        $id = Utils::request("id", -1);

        if ($id == -1) {
            throw new Exception("Identifiant d'article invalide.");
        }

        $articleManager = new ArticleManager();

        // 🔥 Incrémentation des vues
        $articleManager->incrementViews($id);

        // Récupération de l'article
        $article = $articleManager->getArticleById($id);

        if (!$article) {
            throw new Exception("Article introuvable.");
        }

        // Récupération des commentaires liés
        $commentManager = new CommentManager();
        $comments = $commentManager->getAllCommentsByArticleId($id);

        // Affichage de la vue
        $view = new View("Article");
        $view->render("showArticle", [
            'article' => $article,
            'comments' => $comments
        ]);
    }


    /**
     * Affiche le formulaire d'ajout d'un article.
     * @return void
     */
    public function addArticle() : void
    {
        $view = new View("Ajouter un article");
        $view->render("addArticle");
    }

    /**
     * Affiche la page "à propos".
     * @return void
     */
    public function showApropos() {
        $view = new View("A propos");
        $view->render("apropos");
    }
}