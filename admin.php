<html>
    <head>
        <title>Review admin page</title>
    </head>
    <style>
        table, th, td {
            border: 1px solid black;
        }
    </style>
    <body>
        <?php
            if (!isset($_COOKIE["login"]) || $_COOKIE["login"] != "1") {
                header("Location: login.php");
            }
        ?>
        <table id="main">
            <tr>
                <th>Sent at</th>
                <th>Name</th>
                <th>Email</th>
                <th>Course</th>
                <th>Rating</th>
                <th>Review</th>
            </tr>
            <?php
                require "global.php";
                $q = "SELECT * FROM reviews ORDER BY sendtime";
                $ret = $con->query($q);
                foreach ($ret as $row) {
                    $a = $con->query("SELECT name FROM courses WHERE id=". $row["course_id"])->fetch();
                    echo "<tr><td>". $row["sendtime"] . "</td><td>". htmlspecialchars_decode($row["name"]) ."</td><td>". htmlspecialchars_decode($row["email"]) ."</td><td>". htmlspecialchars_decode($a["name"]) ."</td><td>". htmlspecialchars_decode($row["rating"]) ."</td><td>". htmlspecialchars_decode($row["review_text"]) . "</td></tr>";
                }
            ?>
        </table>
        <hr>
        <a href="logout.php">Logout</a>
    </body>
</html>