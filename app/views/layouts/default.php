<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= BASE_URL ?>/bootstrap/css/bootstrap.min.css">

    <title>DEFAULT</title>
</head>
<body>
<h1>DEFAULT</h1>

<p><?= $content ?></p>

<?= debug(\vendor\core\Db::$countSql) ?>
<?= debug(\vendor\core\Db::$queries) ?>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="<?= BASE_URL ?>/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>