<?php
/**
 * Vue de gestion des commentaires pour l'administrateur.
 * Variables attendues :
 * - $comments : tableau d'objets Comment (pseudo, contenu, date, id, idArticle).
 */
?>

<h1>Gestion des commentaires</h1>

<div class="comment-actions">
    <a href="index.php?action=admin" class="btn">Retour Admin</a>
    <a href="index.php?action=monitoring" class="btn">Retour Monitoring</a>
</div>

<div class="adminTable">
    <!-- En-tête -->
    <div class="articleLine header">
        <div class="title">Auteur</div>
        <div class="content">Commentaire</div>
        <div class="date">Date</div>
        <div class="article">Article</div>
        <div class="actions">Actions</div>
    </div>

    <!-- Boucle d'affichage -->
    <?php foreach ($comments as $comment): ?>
        <div class="articleLine">
            <div class="title"><?= htmlspecialchars($comment->getPseudo()) ?></div>
            <div class="content"><?= htmlspecialchars($comment->getContent()) ?></div>
            <div class="date"><?= htmlspecialchars($comment->getDateCreation()->format('d/m/Y H:i')) ?></div>
            <div class="article"><?= htmlspecialchars($comment->getIdArticle()) ?></div>
            <div class="actions">
                <a class="btn" 
                   href="index.php?action=deleteComment&id=<?= $comment->getId() ?>"
                   <?= Utils::askConfirmation("Êtes-vous sûr de vouloir supprimer ce commentaire ?") ?>>
                   Supprimer
                </a>
            </div>
        </div>
    <?php endforeach; ?>
</div>
