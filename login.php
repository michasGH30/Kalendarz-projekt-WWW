<?php
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
                <h1>Panel logowania</h1>
            </header>

            <section class="login_form">
                <form action="login.php" method="post">
                    <label for="login_enter">Login</label> <br />
                    <input type="text" id="login_enter" name="login" /> <br />
                    <label for="password_enter">Hasło</label> <br />
                    <input type="password" name="password" id="password_enter" /> <br />
                    <button class="login_button">Zaloguj się</button>
                </form>
            </section>
            <p>Nie masz jeszcze konta? Załóż już teraz.</p>
            <a class="register_button" href="register.php"> Zajerestruj się</a>
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