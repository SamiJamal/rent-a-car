<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registreren</title>
    <link rel="stylesheet" href="carrental/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="rentacar.css" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <script href="https://code.jquery.com/jquery-3.2.1.slim.min.js"
            integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
            crossorigin="anonymous"></script>
    <script href="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
            integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
            crossorigin="anonymous"></script>
    <script href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
            integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
            crossorigin="anonymous"></script>
    <script href='https://kit.fontawesome.com/a076d05399.js'></script>

    <style>
        button {
            background-color: darkolivegreen;
            width: 100%;
            color: white;
            padding: 15px;
            margin: 10px 0px;
            border: none;
            cursor: pointer;
        }
        form {
            border: 3px solid black;
        }
        input[type=email], input[type=password] {
            width: 100%;
            margin: 8px 0;
            padding: 12px 20px;
            display: inline-block;
            border: 2px solid green;
            box-sizing: border-box;
        }
        button:hover {
            opacity: 0.7;
        }
        .cancelbtn {
            width: auto;
            padding: 10px 18px;
            margin: 10px 5px;
        }


        .container {
            padding: 25px;
            background-color: white;
        }
    </style>

    <?php

    try {
        $dbh = new PDO("mysql:host=localhost;dbname=renacar", "root", "");
    } catch (PDOException $e) {
        echo 'Connection failed: ' . $e->getMessage();
    }
    ?>




</head>
<body>






<ul>
    <li2><a href="../index.php">Home</a></li2>
    <li2><a href="auto's.html">Auto's</a></li2>
    <li2><a href="contact.html">Contact</a></li2>
    <li2><a href="inloggen.html">Inloggen</a></li2>

</ul>

<div class="row">
    <div class="col-6 col-md-offset-3">
        <?php
        if (!empty($_POST['newUser'])) {
            $sql = "INSERT INTO users (email,password) VALUE (?)";
            $stmt = $dbh->prepare($sql);

            if ($stmt->execute([$_POST['newUser']['email,password']])) {
                header('Location: /');
            } else {
                echo 'Something went wrong..';
            }
        }
        ?>
        <form method="post" action="register.php">
            <div class="container">
                <label>Email: </label>
                <input type="email" placeholder="Vul email in" name="email" required>
                <br>
                <label>Wachtwoord : </label>
                <input type="password" placeholder="Wachtwoord" name="password" id="password" required>
                <br>
                <label>Herhaal wachtwoord : </label>
                <input type="password" placeholder="Herhaal wachtwoord" name="password" id="confirm_password" required>
                <br>
                <button type="submit">Maak account</button>
                <button type="button" class="cancelbtn"> Cancel</button>
                Heb ja al een account? <a href="inloggen.html"> L og in! </a>
            </div>
        </form>
    </div>

</div>



<footer class="col-12 fixed-bottom">
    <div class="row">
        <div class="col-6">
            <a href="../index.php" style="color: white">Home</a>
            <br>
            <a href="auto's.html" style="color: white">Auto's</a>
            <br>
            <a href="contact.html" style="color: white">Contact</a>
        </div>

        <div class="col-6">
            <a href="inloggen.html" style="color: white">Inloggen</a>
            <br>
            <br>
            Almere
        </div>
    </div>
</footer>
<script>
    var password = document.getElementById("password")
        , confirm_password = document.getElementById("confirm_password");

    function validatePassword(){
        if(password.value != confirm_password.value) {
            confirm_password.setCustomValidity("Wachtwoord komt niet overeen");
        } else {
            confirm_password.setCustomValidity('');
        }
    }

    password.onchange = validatePassword;
    confirm_password.onkeyup = validatePassword;
</script>
</body>
</html>