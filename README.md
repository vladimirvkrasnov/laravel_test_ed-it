<p>Тестовое задание</p>
<p>Запустить установку зависимостей composer install</p>
<p>Прописать настройки базы данных в .env</p>
<p>Например, создать пустой файл database.sqlite в папке database и прописать настройки для этой базу данных:<br>
DB_CONNECTION=sqlite<br>
DB_DATABASE=database/database.sqlite
</p>
<p>Запустить команду запуска миграций с параметром --seed для загрузки начальных данных:</p>
<p>php artisan migrate --seed</p>
<p>Запуск поиска пересечений:</p>
<p>php artisan intervals:list --left=15 --right=30</p>
