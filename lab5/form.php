<div class="form-group">
    <label>Фамилия:</label>
    <input type="text" name="last_name" value="<?php echo htmlspecialchars($item['last_name'] ?? ''); ?>" required>
</div>
<div class="form-group">
    <label>Имя:</label>
    <input type="text" name="first_name" value="<?php echo htmlspecialchars($item['first_name'] ?? ''); ?>" required>
</div>
<div class="form-group">
    <label>Отчество:</label>
    <input type="text" name="middle_name" value="<?php echo htmlspecialchars($item['middle_name'] ?? ''); ?>">
</div>
<div class="form-group">
    <label>Пол:</label>
    <select name="gender">
        <option value="М" <?php echo ($item['gender'] ?? '') == 'М' ? 'selected' : ''; ?>>М</option>
        <option value="Ж" <?php echo ($item['gender'] ?? '') == 'Ж' ? 'selected' : ''; ?>>Ж</option>
    </select>
</div>
<div class="form-group">
    <label>Дата рождения:</label>
    <input type="date" name="birth_date" value="<?php echo htmlspecialchars($item['birth_date'] ?? ''); ?>" required>
</div>
<div class="form-group">
    <label>Телефон:</label>
    <input type="text" name="phone" value="<?php echo htmlspecialchars($item['phone'] ?? ''); ?>" required>
</div>
<div class="form-group">
    <label>Адрес:</label>
    <input type="text" name="address" value="<?php echo htmlspecialchars($item['address'] ?? ''); ?>">
</div>
<div class="form-group">
    <label>E-mail:</label>
    <input type="email" name="email" value="<?php echo htmlspecialchars($item['email'] ?? ''); ?>">
</div>
<div class="form-group">
    <label>Комментарий:</label>
    <textarea name="comment"><?php echo htmlspecialchars($item['comment'] ?? ''); ?></textarea>
</div>
