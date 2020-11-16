<?php

if (!empty($_POST['deleteCar'])) {
$sql = 'DElETE FROM cars WHERE (brand)"' . $_POST['deleteCar']['brand'] . '"';
if ($dbh->exec($sql)) {
    header('Location: /');
} else {
    echo 'Something went wrong..';
}
}

?>


