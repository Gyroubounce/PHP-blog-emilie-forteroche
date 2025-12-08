<?php
  /**
     * Vue de monitoring des articles pour l'administrateur.
     * Variables attendues :
     * - $articles : tableau des articles avec leurs statistiques (titre, date, vues, nombre de commentaires).
     */
?>

<h2>Monitoring des articles</h2>

<div class="monitoringTable">
    <!-- En-têtes avec tri -->
    <div class="monitoringLine header">
        <div class="cell">
            <span class="label">Titre</span>
            <span class="arrows">
                <a href="index.php?action=monitoring&orderBy=title&direction=ASC">▲</a>
                <a href="index.php?action=monitoring&orderBy=title&direction=DESC">▼</a>
            </span>
        </div>

        <div class="cell">
            <span class="label">Date</span>
            <span class="arrows">
                <a href="index.php?action=monitoring&orderBy=date_creation&direction=ASC">▲</a>
                <a href="index.php?action=monitoring&orderBy=date_creation&direction=DESC">▼</a>
            </span>
        </div>

        <div class="cell">
            <span class="label">Vues</span>
            <span class="arrows">
                <a href="index.php?action=monitoring&orderBy=views&direction=ASC">▲</a>
                <a href="index.php?action=monitoring&orderBy=views&direction=DESC">▼</a>
            </span>
        </div>

        <div class="cell">
            <span class="label">Commentaires</span>
            <span class="arrows">
                <a href="index.php?action=monitoring&orderBy=comment_count&direction=ASC">▲</a>
                <a href="index.php?action=monitoring&orderBy=comment_count&direction=DESC">▼</a>
            </span>
        </div>
    </div>

    <!-- Données -->
    <?php foreach ($articles as $article): ?>
        <div class="monitoringLine">
            <div class="cell title"><?= htmlspecialchars($article['title']) ?></div>
            <div class="cell date"><?= htmlspecialchars($article['date_creation']) ?></div>
            <div class="cell views"><?= htmlspecialchars($article['views']) ?></div>
            <div class="cell comments"><?= htmlspecialchars($article['comment_count']) ?></div>
        </div>
    <?php endforeach; ?>
</div>


 <div class="monitoring-actions">
    <a href="index.php?action=admin" class="submit">Retour Admin</a>
    <a href="index.php?action=comments" class="submit">Gérer les commentaires</a>
 </div>
