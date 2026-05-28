<div class="tool-box">
    <div class="calculator-box">
        <h3><i class="fas fa-calculator"></i> Расчет бюджета поездки (PHP)</h3>
        <form action="/calculator" method="get" class="styled-form">
            <div class="form-group">
                <label>Количество дней</label>
                <input type="number" name="days" value="<?= $_GET['days'] ?? '' ?>" required>
            </div>
            <div class="form-group">
                <label>Средние траты в день ($)</label>
                <input type="number" name="cost" value="<?= $_GET['cost'] ?? '' ?>" required>
            </div>
            <button type="submit" class="btn">Рассчитать</button>
        </form>

        <?php if ($result !== null): ?>
        <div class="result-alert">
            Итоговая стоимость: <strong>$<?= number_format($result, 2) ?></strong>
        </div>
        <?php endif; ?>
    </div>

    <hr>

    <div class="converter-box">
        <h3><i class="fas fa-coins"></i> Быстрый конвертер USD → RUB (JS)</h3>
        <div class="styled-form">
            <div class="form-group">
                <label>Сумма в долларах</label>
                <input type="number" id="usd-input" placeholder="Введите сумму..." oninput="convertCurrency()">
            </div>
            <div class="result-display">
                Результат: <strong id="rub-output">0</strong> руб.
            </div>
        </div>
    </div>
</div>
