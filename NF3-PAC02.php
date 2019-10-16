<?php
$db = mysqli_connect('localhost', 'root') or die('Unable to connect. Check your connection parameters.');
mysqli_select_db($db,'animalsite') or die(mysqli_error($db));

//select the animals
$query = 'select animal_id, animal_name, animal_type, animal_year, animaltype_id, animaltype_raza
from animal, animaltype
where (animal_type=animaltype_id)';


$result = mysqli_query($db,$query) or die (mysqli_error($db));
// show the results
while ($row = mysqli_fetch_assoc($result)){
    extract($row);
    echo $animal_id. "-".$animal_name."-" .$animal_type."-" .$animal_year."-" .$animaltype_id."-" .$animaltype_raza."</br>";
}
?>
