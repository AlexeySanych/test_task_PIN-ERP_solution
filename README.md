<p>Ссылка на тестовое задание: https://docs.google.com/document/d/1fl4eCKdpSXUNyu899NCKaDy_fdHcVPDE-GoO9siZPX4/edit</p>

# ИНСТАЛЯЦИЯ
<p>Склонируйте проект</p>
<p>В файле env/.env укажите корректные значения в перменные для отправки e-mail</p>
<p>В файле app/config/products.php укажите адрес почты для получения писем о создании продукта</p>
<p>Откройте в папке проекта консоль и выполниет следующие команды:</p>
<ul>
  <li>docker-compose run composer update</li>
  <li>docker-compose up nginx -d</li>
  <li>docker exec -it products_app bash</li>
  <li>
      <ul>
        <li>php artisan migrate</li>
        <li>php artisan db:seed</li>
        <li>php artisan queue:work</li>
      </ul>
  </li>
</ul>

<p>Проект будет доступен по ссылке: <a href="http://localhost:8080/">http://localhost:8080/</a>
<p>Логин и пароль для администратора:</p>
<p>admin1@e-mail.ru
<p>admin</p>

<p>Для обычного пользователя:</p>
<p>user@e-mail.ru</p>
<p>user</p>
