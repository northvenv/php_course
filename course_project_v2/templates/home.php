<div class="articles-grid">
    <?php foreach ($articles as $article): ?>
    <div class="card">
        <h3><?= htmlspecialchars($article['title']) ?></h3>
        <p><?= mb_substr(htmlspecialchars($article['text']), 0, 120) ?>...</p>
        <div class="card-footer">
            <a href="/article/<?= $article['id'] ?>" class="btn">Читать далее</a>
        </div>
    </div>
    <?php endforeach; ?>
</div>
