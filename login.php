<html>
    <head>
        <title>Login before continuing</title>
    </head>
    <?php
        require "global.php";
        if (isset($_COOKIE["login"]) && $_COOKIE["login"] == "1") {
            header("Location: admin.php");
            return;
        }
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (!isset($_POST["username"])) return;
            if (!isset($_POST["password"])) return;
            $username = htmlspecialchars($_POST["username"]);
            $password = hash("sha256", htmlspecialchars($_POST["password"]));
            $q = "SELECT COUNT(*) FROM users WHERE username=\"". $username ."\" AND password=\"". $password ."\"";
            $ret = $con->query($q)->fetch();
            if ($ret[0] == "1") {
                setcookie("login", "1");
                header("Location: admin.php");
                return;
            } else {
                echo "Wrong credentials!";
            }
        }
    ?>
    <body>
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <span>Username: <input name="username" id="username" placeholder="Username" required></span><br><br>
            <span>Password: <input name="password" id="password" type="password" placeholder="Password" required></span><br><br>
            <button onclick="submit">Login</button>
        </form>
    </body>
</html>