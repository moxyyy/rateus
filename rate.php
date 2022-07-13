<?php
    require "global.php";

    if (!isset($_POST["name"])) return;
    if (!isset($_POST["email"])) return;
    if (!isset($_POST["course"])) return;
    if (!isset($_POST["rating"])) return;
    if (!isset($_POST["review"])) return;
    $name = htmlspecialchars($_POST["name"]);
    $email = htmlspecialchars($_POST["email"]);
    $course = htmlspecialchars($_POST["course"]);
    $rating = htmlspecialchars($_POST["rating"]);
    $review = htmlspecialchars($_POST["review"]);

    $q = "INSERT INTO reviews VALUES(". $course .", \"". $name ."\", \"". $email ."\", ". $rating . ", \"". $review ."\", \"". date("Y-m-d H:i:s T") ."\")";
    $ret = $con->query($q);
    if ($ret == false) {
        echo "Insert failed.";
        return;
    }
    header("Location: thankyou.html");
?>