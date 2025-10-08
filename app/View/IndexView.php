<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My Mini Framework</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen, Ubuntu, Cantarell, "Open Sans", "Helvetica Neue", sans-serif;
            background: #f5f6fa;
            color: #2f3640;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }
        .container {
            background: #ffffff;
            padding: 2rem;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            text-align: center;
            max-width: 500px;
            width: 90%;
        }
        h1 {
            font-size: 28px;
            margin-bottom: 0.5rem;
        }
        p {
            font-size: 17px;
            color: #555;
            margin-top: 0.5rem;
            line-height: 1.5;
        }
        .footer {
            margin-top: 1.5rem;
            font-size: 14px;
            color: #aaa;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>🚀 Ласкаво просимо!</h1>
        <p>
            Ви успішно запустили мій мініфреймворк.<br>
            Цей проєкт створений для того, щоб зробити розробку вебзастосунків простою та зрозумілою —
            мінімалістична структура, швидкий старт та зручне налаштування.
        </p>
        <p>
            Розпочніть із створення першого контролера та підключення представлення,
            щоб зібрати свій перший вебзастосунок.
        </p>
        {{ mydata }}
        <div class="footer">
            Працює на My Mini Framework 
        </div>
    </div>
</body>
</html>