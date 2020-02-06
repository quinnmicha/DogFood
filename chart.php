<?php

    include (__DIR__ . '/model/db.php');
    global $db;
    $sql = "SELECT name, yearPrice FROM DogFood ORDER BY yearPrice Desc LIMIT 10";
    $stmt = $db->query ($sql);

    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    //var_dump($data);
    $results[0] = array(); // list characters
    $results[1] = array (); // number of votes for each character
    //var_dump($results);
    foreach ($data as $d) {
        array_push($results[0], $d['name']);
        array_push($results[1], $d['yearPrice']);
    }
    $jsonResults= json_encode($results);
    //var_dump($jsonResults);
    echo $jsonResults;
    

?>