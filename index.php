<!DOCTYPE html>
<html>
    <head>
        <title>Rate us</title>
    </head>
    <body>
        <form method="POST" action="rate.php">
            <span>
                Your name:
                <input name="name" id="name" placeholder="Enter your name" required>
            </span><br><br>
            <span>
                Your email:
                <input name="email" id="email" placeholder="Enter your email" required>
            </span><br><br>
            <span>
                The course you took:
                <select name="course" id="course" required>
                    <?php
                        require "global.php";
                        $ret = $con->query("SELECT * FROM courses");
                        foreach ($ret as $row) {
                            echo "<option value=\"". $row["id"] ."\">" . $row["name"] . "</option>";
                        }
                    ?>
                </select>
            </span><br><br>
            <span>Your rating of the course:</span>
            <div id="star_rating">
                <input type="radio" name="rating" id="rate5" value="5"><label for="rate5">5</label>
                <input type="radio" name="rating" id="rate4" value="4"><label for="rate4">4</label>
                <input type="radio" name="rating" id="rate3" value="3"><label for="rate3">3</label>
                <input type="radio" name="rating" id="rate2" value="2"><label for="rate2">2</label>
                <input type="radio" name="rating" id="rate1" value="1"><label for="rate1">1</label>
            </div><br>
            <span>Your review:</span><br>
            <textarea style="resize: none;" name="review" id="review" rows="10" cols="50" required></textarea><br><br>
            <button onclick="submit">Submit</button>
        </form>
    </body>
</html>