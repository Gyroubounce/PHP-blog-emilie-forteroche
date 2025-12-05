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
            <a href="index.php?action=monitoring&orderBy=title&direction=ASC">Titre ▲</a>
            <a href="index.php?action=monitoring&orderBy=title&direction=DESC">▼</a>
        </div>
        <div class="date">
            <a href="index.php?action=monitoring&orderBy=date_creation&direction=ASC">Date ▲</a>
            <a href="index.php?action=monitoring&orderBy=date_creation&direction=DESC">▼</a>
        </div>
        <div class="views">
            <a href="index.php?action=monitoring&orderBy=views&direction=ASC">Vues ▲</a>
            <a href="index.php?action=monitoring&orderBy=views&direction=DESC">▼</a>
        </div>
        <div class="comments">
            <a href="index.php?action=monitoring&orderBy=comment_count&direction=ASC">Commentaires ▲</a>
            <a href="index.php?action=monitoring&orderBy=comment_count&direction=DESC">▼</a>
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
