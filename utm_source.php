<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Пример страницы</title>
    <script>
        // Функция для установки куки на определенное количество часов
        function setCookie(name, value, hours) {
            let date = new Date();
            date.setTime(date.getTime() + (hours * 60 * 60 * 1000)); // Установка куки на hours часов
            document.cookie = name + "=" + (value || "") + "; expires=" + date.toUTCString() + "; path=/";
        }

        // Функция для получения значения куки
        function getCookie(name) {
            let nameEQ = name + "=";
            let ca = document.cookie.split(';');
            for (let i = 0; i < ca.length; i++) {
                let c = ca[i];
                while (c.charAt(0) == ' ') c = c.substring(1, c.length);
                if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
            }
            return null;
        }

        // Проверка наличия параметра ?utm_source= в URL
        function checkURLParameter() {
            const urlParams = new URLSearchParams(window.location.search);
            if (urlParams.has('utm_source')) {
                // Устанавливаем куку hide_script на 2 часа
                setCookie('hide_script', 'true', 2);
            }
        }

        // Функция для проверки и скрытия скрипта
        function handleScriptDisplay() {
            const hideScript = getCookie('hide_script');
            if (!hideScript) {
                // Если кука не установлена, выводим скрипт
                const script = document.createElement('script');
                script.innerHTML = "console.log('Скрипт виден, кука не установлена.');";
                document.head.appendChild(script);
            } else {
                // Если кука установлена, выводим сообщение о скрытии скрипта
                console.log('Скрипт скрыт, так как кука установлена.');
            }
        }

        // Выполняем действия при загрузке страницы
        window.onload = function() {
            checkURLParameter(); // Проверяем параметр в URL
            handleScriptDisplay(); // Проверяем и скрываем/отображаем скрипт
        }
    </script>
</head>
<body>
    <h1>Добро пожаловать на страницу!</h1>
</body>
</html>
