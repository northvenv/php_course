<div class="form-container">
    <form action="/article/<?= $article['id'] ?>/edit" method="post" class="styled-form">
        <div class="form-group">
            <label>Заголовок статьи</label>
            <input type="text" name="title" value="<?= htmlspecialchars($article['title']) ?>" required>
        </div>
        <div class="form-group">
            <label>Текст статьи</label>
            <textarea name="text" rows="15" required><?= htmlspecialchars($article['text']) ?></textarea>
        </div>
        <div class="form-actions">
            <button type="submit" class="btn">Сохранить изменения</button>
            <a href="/article/<?= $article['id'] ?>" class="btn btn-text">Отмена</a>
        </div>
    </form>
</div>
