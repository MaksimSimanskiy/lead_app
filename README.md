# Инструкция по развертыванию приложения "Лид-менеджер"

1. Создайте базу данных:<br>

    Создайте нового пользователя базы данных и предоставьте ему все привилегии на созданную базу данных.<br>
    Запишите имя базы данных, имя пользователя и пароль.<br>

2. Перейдите в директорию, где будет развернуто ваше приложение.<br>

    Клонируйте  репозиторий из GitHub:<br>
    ```clone https://github.com/MaksimSimanskiy/lead_app.git```<br>

3. Перейдите в папку<br> ```cd lead_app```<br>

4. Установите composer<br>

    Выполните команду <br>
    ```composer install --optimize-autoloader --no-dev```<br>

5. Создайте файл .env и настройте его, его можно создать на основе файла .env.example.<br>

6. Отредактируйте файл .env и укажите параметры базы данных<br>

    DB_CONNECTION=mysql<br>
    DB_HOST=127.0.0.1<br>
    DB_PORT=3306<br>
    DB_DATABASE=your_database_name<br>
    DB_USERNAME=your_database_user<br>
    DB_PASSWORD=your_database_password<br>

7. Установите параметры smtp<br>

    MAIL_MAILER=smtp<br>
    MAIL_HOST=smtp.example.ru<br>
    MAIL_PORT=465<br>
    MAIL_USERNAME=your_username<br>
    MAIL_PASSWORD=your_password<br>
    MAIL_ENCRYPTION=ssl<br>
    MAIL_FROM_ADDRESS="your_mail_address"<br>

8. Установите параметры локализации(опционально)<br>

    APP_LOCALE=ru<br>
    APP_FALLBACK_LOCALE=ru<br>
    APP_FAKER_LOCALE=en_US<br>

9. Сгенерируйте ключ приложения<br>
    ```php artisan key:generate```<br>

10. Запустите миграции для создания таблиц в базе данных<br>
    ```php artisan migrate --seed```<br>
    
11. Запустите команду для сборки приложения<br>
    ```npm run build```<br>

12. Очистите кэш приложения<br>
    ```php artisan config:clear```<br>
    ```php artisan route:clear```<br>
    ```php artisan view:clear```<br>

13. Так же как правило требуется создать символическую ссылку на папку public к папке public_html(как правило на хостинге эта папка содержит страницы сайта)<br>
    ```ln -s public public_html```

## Скриншоты приложения
Экран входа<br>

![image](https://github.com/user-attachments/assets/e73b5ac3-5ae1-41b8-9c1a-b6ed5b5b4554)<br>

Список лидов<br>

![image](https://github.com/user-attachments/assets/0e1a3403-19dc-41e7-9279-083f681ff187)<br>

Редактирование лида<br>

![image](https://github.com/user-attachments/assets/c52ea381-ca4a-4b0a-94f8-73b6984a3b61)<br>

Профиль пользователя<br>

![image](https://github.com/user-attachments/assets/4545ff2c-02c1-4ed8-8a5b-051a65f6ce42)<br>