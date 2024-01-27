<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mammootty Movies</title>
    <style>
        body {
    background-color: #1e1e1e; /* Black */
    color: #fff; /* White */
    font-family: 'Arial', sans-serif;
    margin: 0;
    padding: 0;
    display: flex;
    opacity: 1.0; /* Adjust the opacity as needed (0.0 to 1.0) */
}
        #form-container {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        #search-results {
            flex: 1;
            padding: 20px;
        }

        #aa {
            background-color: #9400d3; /* Violet */
            border-radius: 10px;
            padding: 20px;
            width: 400px;
            text-align: center;
        }

        h1 {
            color: #fff; /* White */
        }

        table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #fff; /* White */
            padding: 10px;
            background-color: #9400d3;
        }

        th {
            background-color: #9400d3; /* Violet */
            color: #fff; /* White */
        }

        input[type="text"], input[type="submit"] {
            padding: 10px;
            margin: 5px;
            width: 80%;
            border: none;
            border-radius: 5px;
        }

        input[type="submit"] {
            background-color: #9400d3; /* Violet */
            color: #fff; /* White */
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #4b0082; /* Indigo */
        }

    </style>
</head>
<body background="https://pbs.twimg.com/media/E8LUjxkVoAEuj4H.jpg">
    <div id="form-container">
        <center>
            <div id="aa">
                <h1>MOVIES OF MEGASTAR</h1>
                <form action="m.php" name="mreg" method="post" onsubmit="return registermovie()">
                    <table>
                        <tr><td>NAME OF THE MOVIE</td><td><input type="text" name="mname"></td></tr>
                        <tr><td>MOVIE RELEASED YEAR</td><td><input type="text" name="myear"></td></tr>
                        <tr><td>BOXOFFICE STATUS</td><td><input type="text" name="mbox"></td></tr>
                        <tr><td>NAME OF THE DIRECTOR</td><td><input type="text" name="mdir"></td></tr>
                        <tr><td>GENRE OF THE MOVIE</td><td><input type="text" name="mgen"></td></tr>
                    </table>
                    <input type="submit" name="sub" value="Submit">
                </form>
                <h1>SEARCH BY YEAR</h1>
                <form action='m.php' name='areg' method='post'>
                    <table>
                        <tr><td>RELEASED YEAR</td><td><input type="text" name="yyear"></td></tr>
                    </table>
                    <input type="submit" name="ssub" value="Search">
                </form>
            </div>
        </center>
    </div>

    <div id="search-results">
    <script>
        function registermovie() {
            var a = document.forms['mreg']['mname'].value;
            var b = document.forms['mreg']['myear'].value;
            var c = document.forms['mreg']['mbox'].value;
            var d = document.forms['mreg']['mdir'].value;
            var e = document.forms['mreg']['mgen'].value;

            if (a === "") {
                alert("Enter the name of the movie");
                return false;
            }
            if (b === "") {
                alert("Enter the movie released year");
                return false;
            }
            if (c === "") {
                alert("Enter the box office status of the movie");
                return false;
            }
            if (d === "") {
                alert("Enter the name of the director");
                return false;
            }
            if (e === "") {
                alert("Enter the genre of the movie");
                return false;
            }
        }
    </script>
        <?php
        echo "<center>";
        $conn = mysqli_connect("localhost", "root", "", "mammootty");
        if (!$conn) {
            die("connection failed:" . mysqli_connect_error());
        }
        // echo "connection successful";
        if (isset($_POST["sub"])) {
            $a_name = $_POST["mname"];
            $a_year = $_POST["myear"];
            $a_box = $_POST["mbox"];
            $a_dir = $_POST["mdir"];
            $a_gen = $_POST["mgen"];
            $sql = "INSERT INTO `movies` (`name`, `year`, `boxoffice`, `director`, `genre`) VALUES ('$a_name','$a_year','$a_box','$a_dir','$a_gen') ";
            if (mysqli_query($conn, $sql)) {
                // echo 'new row created successfully';
            } else {
                echo 'error:' . $sql . '<br>' . mysqli_error($conn);
            }
        }
        if (isset($_POST['ssub'])) {
            $a_year = $_POST['yyear'];
            echo "<h1>Search Results</h1>";
            $sql1 = "SELECT * FROM movies WHERE year='$a_year' ";
            $res = mysqli_query($conn, $sql1);
            echo "<table border='1'>";
            echo "<tr><th>Name</th><th>Year</th><th>Box Office</th><th>Director</th><th>Genre</th></tr>";
            while ($row = mysqli_fetch_assoc($res)) {
                echo "<tr>";
                echo "<td>" . $row["name"] . "</td>";
                echo "<td>" . $row["year"] . "</td>";
                echo "<td>" . $row["boxoffice"] . "</td>";
                echo "<td>" . $row["director"] . "</td>";
                echo "<td>" . $row["genre"] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
        }
        echo "</center>";
        ?>
    </div>
</body>
</html>


