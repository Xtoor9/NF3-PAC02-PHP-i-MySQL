<?php
//connect to MySQL
$db = mysqli_connect('localhost', 'root') or
    die ('Unable to connect. Check your connection parameters.');

//create the main database if it doesn't already exist
$query = 'CREATE DATABASE IF NOT EXISTS animalsite';
mysqli_query($db,$query) or die(mysqli_error($db))

//make sure our recently created database is the active one
mysqli_select_db($db,'animalsite') or die(mysqli_error($db));

//create the animal table

$query = 'CREATE TABLE animal(
        animal_id        INTEGER UNSIGNED  NOT NULL AUTO_INCREMENT,
        animal_name      VARCHAR(255)      NOT NULL,
        animal_type      TINYINT           NOT NULL DEFAULT 0,
        animal_year      SMALLINT UNSIGNED NOT NULL DEFAULT 0,
      

        PRIMARY KEY (animal_id),
        KEY animal_type (animal_type, animal_year)
    )
    ENGINE=MyISAM';
mysqli_query($db,$query) or die (mysqli_error($db));

//create the movietype table
$query = 'CREATE TABLE animaltype (
        animaltype_id    TINYINT UNSIGNED NOT NULL AUTO_INCREMENT,
        animaltype_raza VARCHAR(100)     NOT NULL,
        PRIMARY KEY (animaltype_id)
    )
    ENGINE=MyISAM';
mysqli_query($db,$query) or die(mysqli_error($db));


echo 'Animal database successfully created!';

?>