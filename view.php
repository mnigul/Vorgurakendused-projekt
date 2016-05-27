<!doctype HTML>
<html>

<head>
    <title>Minu esimene laoprogramm</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

    <meta charset="utf-8">

    <style>
        #lisa-vorm {
            display: none;
        }

        * {
            text-align: -moz-center;
        }

        table {
            table-layout: fixed;
        }

        td {
            word-wrap: break-word
        }
    </style>

</head>

<body align="center">

    <?php foreach (message_list() as $message): ?>

    <p style="border: 1px solid red; background: #EEE;" align="center" ;>
        <?= $message; ?>
    </p>

    <?php endforeach; ?>


    <div style="float: right">
        <form method="post" action="<?= $_SERVER['PHP_SELF'];?>">
            <input type="hidden" name="action" value="logout">
            <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token']; ?>">
            <button type="submit" class="btn btn-danger">Logi välja</button>
        </form>
    </div>

    <h1>Minu esimene laoprogramm</h1>

    <p id="kuva-nupp">
        <button type="button" class="btn btn-info">Kuva lisamise vorm</button>
    </p>

    <form id="lisa-vorm" method="post" action="<?= $_SERVER['PHP_SELF'];?>">

        <input type="hidden" name="action" value="add">
        <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token']; ?>">

        <p id="peida-nupp">
            <button type="button" class="btn btn-info">Peida lisamise vorm</button>
        </p>

        <p>&nbsp;</p>

        <table align="center">
            <tr>
                <td>Nimetus</td>
                <td>
                    <input type="text" class="form-control" id="nimetus" name="nimetus">
                </td>
            </tr>
            <tr>
                <td>Kogus</td>
                <td>
                    <input type="number" class="form-control" id="kogus" name="kogus">
                </td>
            </tr>
        </table>

        <p>&nbsp;</p>

        <p>
            <button type="submit">Lisa kirje</button>
        </p>

    </form>

    <table id="ladu" border="1" align="center" class="table table-striped table-hover ">
        <thead>
            <tr>
                <th>Nimetus</th>
                <th>Kogus</th>
                <th>Tegevused</th>
            </tr>
        </thead>

        <tbody>

            <?php

        foreach ( model_load($page) as $rida): ?>

                <tr>
                    <td>
                        <?=
                        htmlspecialchars($rida['Nimetus']);
                    ?>
                    </td>
                    <td>
                        <form method="post" action="<?= $_SERVER['PHP_SELF'];?>">
                            <input type="hidden" name="action" value="update">
                            <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'];?>">
                            <input type="hidden" name="id" value="<?= $rida['id']; ?>">
                            <input type="number" name="kogus" value="<?= $rida['Kogus']; ?>" style="width: 6em; text-align: right;">
                            <button type="submit" class="btn btn-success">Uuenda</button>
                        </form>

                    </td>
                    <td>

                        <form method="post" action="<?= $_SERVER['PHP_SELF'];?>">
                            <input type="hidden" name="action" value="delete">
                            <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'];?>">
                            <input type="hidden" name="id" value="<?= $rida['id']; ?>">
                            <button type="submit" class="btn btn-warning">Kustuta rida</button>
                        </form>

                    </td>
                </tr>

                <?php endforeach; ?>

        </tbody>
    </table>

    <p>
        <?php
    	if(isset($_GET['page'])):
    		if($_GET['page'] != 0): ?>

            <a href="<?= $_SERVER['PHP_SELF']?>?page=<?= $page - 1 ?>">
		    		eelmisele lehele
		    	</a>
            <?php
    	 	endif;
    	endif;
    	if (next_page($page)): ?>
                |
                <a href="<?= $_SERVER['PHP_SELF']?>?page=<?= $page + 1 ?>">
	    		järgmisele lehele
	    	</a>

                <?php
    	endif; ?>
    </p>

    <script src="ladu.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</body>

</html>
