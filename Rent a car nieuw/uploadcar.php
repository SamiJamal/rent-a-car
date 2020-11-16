<?php
if (!empty($_POST['newCar'])) {
    $sql = "INSERT INTO cars (brand) VALUE (?)";
    $stmt = $dbh->prepare($sql);

    if ($stmt->execute([$_POST['newCar']['brand']])) {
        header('Location: /');
    } else {
        echo 'Something went wrong..';
    }
}
?>