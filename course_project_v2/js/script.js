function convertCurrency() {
    const usd = document.getElementById('usd-input').value;
    const rate = 95.5; // Примерный курс
    const result = usd * rate;
    document.getElementById('rub-output').innerText = result.toLocaleString('ru-RU', { minimumFractionDigits: 2 });
}

// Приветствие по времени суток
document.addEventListener('DOMContentLoaded', () => {
    const hour = new Date().getHours();
    let greeting;
    if (hour >= 5 && hour < 12) greeting = "Доброе утро";
    else if (hour >= 12 && hour < 18) greeting = "Добрый день";
    else if (hour >= 18 && hour < 23) greeting = "Добрый вечер";
    else greeting = "Доброй ночи";

    const welcomeMsg = document.createElement('div');
    welcomeMsg.style.textAlign = 'center';
    welcomeMsg.style.padding = '10px';
    welcomeMsg.style.background = '#ff6600';
    welcomeMsg.style.color = 'white';
    welcomeMsg.innerHTML = `<strong>${greeting}, путешественник!</strong> Рады видеть вас в нашем блоге.`;
    
    document.body.prepend(welcomeMsg);
});
