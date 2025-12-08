<?php
/**
 * Vue de gestion des commentaires pour l'administrateur.
 * Variables attendues :
 * - $comments : tableau d'objets Comment (pseudo, contenu, date, id, idArticle).
 */
?>

<h2>Gestion des commentaires</h2>


<div class="commentTable">
    <!-- En-tête -->
    <div class="commentLine header">
        <div class="cell title">Auteur</div>
        <div class="cell content">Commentaires</div>
        <div class="cell date">Date</div>
        <div class="cell article">Article</div>
        <div class="cell actions">Action</div>
    </div>

    <!-- Boucle d'affichage -->
    <?php foreach ($comments as $comment): ?>
        <div class="commentLine">
            <div class="cell title"><?= htmlspecialchars($comment->getPseudo()) ?></div>
            <div class="cell content"><?= htmlspecialchars($comment->getContent()) ?></div>
            <div class="cell date"><?= htmlspecialchars($comment->getDateCreation()->format('d/m/Y H:i')) ?></div>
            <div class="cell article"><?= htmlspecialchars($comment->getIdArticle()) ?></div>
            <div class="cell actions">
                <a class="submit" 
                   href="index.php?action=deleteComment&id=<?= $comment->getId() ?>"
                   <?= Utils::askConfirmation("Êtes-vous sûr de vouloir supprimer ce commentaire ?") ?>>
                   Supprimer
                </a>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<div class="monitoring-actions">
    <a href="index.php?action=admin" class="submit">Retour Admin</a>
    <a href="index.php?action=monitoring" class="submit">Retour Monitoring</a>
</div>
