<div class="form-container">
    <form action="/comment/<?= $comment['id'] ?>/edit" method="post" class="styled-form">
        <div class="form-group">
            <label>Ваш комментарий</label>
            <textarea name="text" rows="5" required><?= htmlspecialchars($comment['text']) ?></textarea>
        </div>
        <div class="form-actions">
            <button type="submit" class="btn">Обновить комментарий</button>
            <a href="/article/<?= $comment['article_id'] ?>" class="btn btn-text">Отмена</a>
        </div>
    </form>
</div>
