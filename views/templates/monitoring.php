<?php
  /**
     * Vue de monitoring des articles pour l'administrateur.
     * Variables attendues :
     * - $articles : tableau des articles avec leurs statistiques (titre, date, vues, nombre de commentaires).
     */
?>

<h1>Monitoring des articles</h1>

<div class="monitoring-actions">
    <a href="index.php?action=admin" class="btn">Retour Admin</a>
    <a href="index.php?action=comments" class="btn">Gérer les commentaires</a>
</div>

<div class="adminTable">
    <!-- En-têtes avec tri -->
    <div class="articleLine header">
        <div class="title">
            <a href="?sort=title&order=asc">Titre ▲</a>
            <a href="?sort=title&order=desc">▼</a>
        </div>
        <div class="date">
            <a href="?sort=date&order=asc">Date ▲</a>
            <a href="?sort=date&order=desc">▼</a>
        </div>
        <div class="views">
            <a href="?sort=views&order=asc">Vues ▲</a>
            <a href="?sort=views&order=desc">▼</a>
        </div>
        <div class="comments">
            <a href="?sort=comment_count&order=asc">Commentaires ▲</a>
            <a href="?sort=comment_count&order=desc">▼</a>
        </div>
    </div>

    <!-- Boucle d'affichage -->
    <?php foreach ($articles as $article): ?>
        <div class="articleLine">
            <div class="title"><?= htmlspecialchars($article['title']) ?></div>
            <div class="date"><?= htmlspecialchars($article['date_creation']) ?></div>
            <div class="views"><?= htmlspecialchars($article['views']) ?></div>
            <div class="comments"><?= htmlspecialchars($article['comment_count']) ?></div>
        </div>
    <?php endforeach; ?>
</div>
