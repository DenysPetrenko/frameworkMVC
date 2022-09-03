<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= isset($title) ?? 'default' ?></title>
</head>
<body>
<header>
    <div>
        <div>
            <a href="/">home</a>
        </div>
        <div>
            <?php if (isset($user_login)) : ?>
                <div></div>

                <?= $user_login->first_name ?? '' ?>
                <a href="/login">Sign in</a>
            <?php endif; ?>
        </div>
    </div>
</header>

<?= $content ?? '' ?>
</body>
</html>
