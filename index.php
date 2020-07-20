<!DOCTYPE html>
<html>
    <head>
        <link href="static/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="static/js/bootstrap.min.js"></script>
        <script src="static/js/jquery.min.js"></script>
        <link rel="stylesheet" href="static/css/all.css">
    </head>
    <body>
        <div class="container">
            <div class="card mt-5">
                <div class="card-header">Login</div>
                <div class="card-body">
                    <?php
	                $db_host = 'ubuntu-server';
	 		$db_name = 'test_db';
			$db_user = 'test_user';
			$db_password = 'test_pass';
                        $mysqli = new mysqli($db_host, $db_user, $db_password, $db_name);
                        if (mysqli_connect_errno()) {
                            die("Verbindung fehlgeschlagen: " . mysqli_connect_error());
                        }

                        if (isset($_GET['name']) && isset($_GET['passwort'])) {
                            $sql = "SELECT id, name, password FROM users WHERE name='" . $_GET['name'] . "' AND password='" . $_GET['passwort'] . "';";

                            echo "<p class='text-primary text-center'>$sql</p>";
                            if ($result = $mysqli->query($sql)) {
                                if ($result->num_rows > 0) {
                                    echo "<p class='text-success text-center'>Erfolgreich angemeldet</p>";
                                } else {
                                    echo "<p class='text-danger text-center'>Fehler beim Anmelden</p>";
                                }
                                $result->close();
                            } else {
                                echo "Fehler!" . $mysqli->error;
                            }
                        }
                        $mysqli->close();
                        ?>
                    <form>
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                                </div>
                                <input name="name" type="text" class="form-control" placeholder="Name">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                                </div>
                                <input name="passwort" class="form-control" placeholder="Passwort" type="password">
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block">Login</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="mt-5">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Eingabe</th>
                            <th scope="col">Name</th>
                            <th scope="col">Passwort</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Normale Anmeldung</td>
                            <td>admin</td>
                            <td>admin_password</td>
                        </tr>
                        <tr>
                            <td>SQL Injection</td>
                            <td>' OR '1'='1</td>
                            <td>' OR '1'='1</td>
                        </tr>
                        <tr>
                            <td>SQL Injection Stacked Queries</td>
                            <td>' OR '1'='1</td>
                            <td>'; BEFEHL'</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </body>
</html>
