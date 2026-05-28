<article class="full-article">
    <p class="article-meta">Опубликовано: <?= $article['date'] ?> | Автор: <strong><?= htmlspecialchars($author['nickname']) ?></strong></p>
    <div class="article-body">
        <?= nl2br(htmlspecialchars($article['text'])) ?>
    </div>
    <div class="admin-actions">
        <a href="/article/<?= $article['id'] ?>/edit" class="btn btn-secondary"><i class="fas fa-edit"></i> Редактировать статью</a>
    </div>
</article>

<section class="comments-section">
    <h2><i class="fas fa-comments"></i> Комментарии</h2>
    
    <div class="comments-list">
        <?php foreach ($comments as $comment): ?>
        <div class="comment-card" id="comment<?= $comment['id'] ?>">
            <p><?= nl2br(htmlspecialchars($comment['text'])) ?></p>
            <div class="comment-footer">
                <small><?= $comment['date'] ?></small>
                <a href="/comment/<?= $comment['id'] ?>/edit" class="edit-link">Редактировать</a>
            </div>
        </div>
        <?php endforeach; ?>
    </div>

    <div class="comment-form-box">
        <h3>Оставить комментарий</h3>
        <form action="/article/<?= $article['id'] ?>/comments" method="post">
            <textarea name="text" placeholder="Ваш комментарий..." required></textarea>
            <button type="submit" class="btn">Отправить</button>
        </form>
    </div>
</section>
