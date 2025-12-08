<?php

class CommentController 
{
    /**
     * Ajoute un commentaire.
     * @return void
     */
    public function addComment() : void
    {
        // Récupération des données du formulaire.
        $pseudo = Utils::request("pseudo");
        $content = Utils::request("content");
        $idArticle = Utils::request("idArticle");

        // On vérifie que les données sont valides.
        if (empty($pseudo) || empty($content) || empty($idArticle)) {
            throw new Exception("Tous les champs sont obligatoires. 3");
        }

        // On vérifie que l'article existe.
        $articleManager = new ArticleManager();
        $article = $articleManager->getArticleById($idArticle);
        if (!$article) {
            throw new Exception("L'article demandé n'existe pas.");
        }

        // On crée l'objet Comment.
        $comment = new Comment([
            'pseudo' => $pseudo,
            'content' => $content,
            'idArticle' => $idArticle
        ]);

        // On ajoute le commentaire.
        $commentManager = new CommentManager();
        $result = $commentManager->addComment($comment);

        // On vérifie que l'ajout a bien fonctionné.
        if (!$result) {
            throw new Exception("Une erreur est survenue lors de l'ajout du commentaire.");
        }

        // On redirige vers la page de l'article.
        Utils::redirect("showArticle", ['id' => $idArticle]);
    }

    /**
     * Affiche la page de gestion des commentaires (admin).
     * @return void
     */
    public function showComments() : void
    {
        // Vérification que l'utilisateur est connecté (comme dans AdminController).
        if (!isset($_SESSION['user'])) {
            Utils::redirect("connectionForm");
        }

        // On récupère tous les commentaires.
        $commentManager = new CommentManager();
        $comments = $commentManager->getAllComments();

        // On affiche la vue comments.php
        $view = new View("Commentaires");
        $view->render("comments", [
            'comments' => $comments
        ]);
    }

    /**
     * Supprime un commentaire.
     * @return void
     */
public function deleteComment() : void
{
    if (!isset($_SESSION['user'])) {
        Utils::redirect("connectionForm");
    }

    $id = (int)Utils::request("id", -1);

    if ($id <= 0) {
        throw new Exception("Identifiant du commentaire invalide.");
    }

    $commentManager = new CommentManager();
    $success = $commentManager->deleteCommentById($id);

    if (!$success) {
        throw new Exception("Erreur lors de la suppression du commentaire.");
    }

    // Retour à la page de gestion des commentaires
    Utils::redirect("comments");
}

}