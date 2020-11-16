<?php

try {
    $dbh = new PDO("mysql:host=localhost;dbname=renacar", "root", "");
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}
?>


<?php
$stmt = $dbh->prepare("SELECT * FROM cars");
$stmt->execute();

if ($cars = $stmt->fetchAll()) {
    echo '<ol>';
    foreach ($cars as $car) {
        echo '<li>'.$car['brand'].'</li>';

        echo  '<button type="submit">verwijderen</button>';
    }
    echo '</ol>';
}

?>



    <button type="submit">verwijderen</button>


    <h4>Auto opslaan:</h4>
    <form action="/" method="post">
        <label for="nameinput">Naam</label>
        <input id="nameinput" type="text" name="newCar[brand]">
        <button type="submit">Opslaan</button>


    </form>
<?php include 'uploadcar.php';
?>



<?php include 'deletecar.php';

?>