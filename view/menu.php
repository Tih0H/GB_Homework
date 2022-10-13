<a href="/">Главная</a><br>

<br>
<?php if ($username !== null) : ?>
    <p>Рады вас приветствовать, <?= $username ?>. <a href="/?controller=security&action=logout">[Выход]</a></p><br>
    <a href="/?controller=tasks">Ваши задачи</a>
<?php else : ?>
    <a href="/?controller=security">Авторизация</a>

<?php endif ?><br>