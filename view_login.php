<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>Logi sisse</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
</head>

<body>
    <h1 align="center">Logi sisse</h1>

    <form method="post" action="<?= $_SERVER['PHP_SELF'];?>">

        <input type="hidden" name="action" value="login">
        <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token']; ?>">

        <table align="center">
            <tr>

                <td>Kasutajanimi</td>
                <td>
                    <input type="text" class="form-control" name="kasutajanimi" required>
                </td>
            </tr>
            <tr>
                <td>Parool</td>
                <td>
                    <input type="password" class="form-control" name="parool" required>
                </td>
            </tr>
        </table>

        <p align="center">
            <button type="submit">Logi sisse</button> või
            <a href="<?= $_SERVER['PHP_SELF'];?>?view=register">
					registreeri konto
				</a>
        </p>

    </form>

</body>

</html>
