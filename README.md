Инструкция по развертыванию приложения "Лид-менеджер"

1Создайте базу данных :

Создайте нового пользователя базы данных и предоставьте ему все привилегии на созданную базу данных.
Запишите имя базы данных, имя пользователя и пароль.

2 Перейдите в директорию, где будет развернуто ваше приложение.
Клонируйте  репозиторий из GitHub https://github.com/MaksimSimanskiy/lead_app.git

3 Перейдите в папку cd lead_app

4 Установите composer.
 Выполните команду composer install --optimize-autoloader --no-dev

5 Создайте файл .env и настройте его, его можно создать на основе файла .env.example.

6 Отредактируйте файл .env и укажите параметры базы данных

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_database_user
DB_PASSWORD=your_database_password

7 Установите параметры smtp

MAIL_MAILER=smtp
MAIL_HOST=smtp.example.ru
MAIL_PORT=465
MAIL_USERNAME=your_username
MAIL_PASSWORD=your_password
MAIL_ENCRYPTION=ssl
MAIL_FROM_ADDRESS="your_mail_address"

8 Установите параметры локализации(опционально)

APP_LOCALE=ru
APP_FALLBACK_LOCALE=ru
APP_FAKER_LOCALE=en_US

9 Сгенерируйте ключ приложения
php artisan key:generate

10 Запустите миграции для создания таблиц в базе данных
php artisan migrate --force

11 Очистите кэш приложения

php artisan config:cache
php artisan route:cache
php artisan view:cache

12 Так же как правило требуется создать символическую ссылку на папку public к папке public_html(как правило на хостинге эта папка содержит страницы сайта)
ln -s public public_html


