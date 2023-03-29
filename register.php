<?php
require("session.php");
require("db.php");
if (isset($_SESSION['logged']))
    header("location: index.php");
else if (isset($_POST["login"])) {
    $login = $_POST["login"];
    $password = $_POST["password"];
    $sql = "SELECT * FROM users WHERE login='$login' AND password='" . md5($password) . "'";
    $result = $conn->query($sql);
    if ($result->num_rows == 1) {
        $_SESSION["already_reg"] = true;
    } else {
        $name = $_POST["name"];
        $surname = $_POST["surname"];
        $date = date('Y-m-d');
        $password = md5($password);
        $sql = "INSERT INTO `users` (`ID`, `login`, `password`, `name`, `surname`, `date_of_join`) VALUES (NULL, '$login', '$password', '$name', '$surname', '$date')";
        $conn->query($sql);
        $_SESSION["logged"] = true;
        header("location: index.php");
    }
}
?>

<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Kalendarz</title>
    <link rel="stylesheet" href="style/style.css" />
    <link rel="stylesheet" href="style/buttons.css" />
    <link rel="stylesheet" href="style/scrollbar.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
</head>

<body>
    <div class="container_login">
        <main class="main">
            <header class="header">
                <h1>Rejestracja</h1>
            </header>

            <section class="login_form">
                <form action="register.php" method="post">
                    <label for="login_enter">Login</label> <br />
                    <input type="text" id="login_enter" name="login" /> <br />
                    <label for="password_enter">Hasło</label> <br />
                    <input type="password" name="password" id="password_enter" /> <br />
                    <label for="name_enter">Imię</label> <br />
                    <input type="text" name="name" id="name_enter" /> <br />
                    <label for="surname_enter">Nazwisko</label> <br />
                    <input type="text" name="surname" id="surname_enter" /> <br />
                    <button class="register_button">Zajerestruj się</button>
                </form>
            </section>
            <p>Masz jeszcze konto? Zaloguj się.</p>
            <a class="login_button" href="login.php"> Zaloguj się</a>
            <?php
            if (isset($_SESSION["already_reg"])) {
                echo "<p style='color:red'>Podałeś login lub hasło, które już jest w bazie danych. Spróbuj ponownie.</p>";
                unset($_SESSION["already_reg"]);
            }
            ?>
        </main>
    </div>

    <footer class="footer">
        <p>
            Strona wykonana przez <a href="https://github.com/michasGH30?tab=repositories" target="_blank">Michał Żuk</a> &copy; 2023.
        </p>
    </footer>
    <script src="scripts/script.js"></script>
</body>

</html>