<?php

    include ('db.php');
    
    function getData () {
        global $db;
        
        $results = [];
        $stmt = $db->prepare("SELECT * FROM DogFood");      
        
        if ( $stmt->execute() && $stmt->rowCount() > 0 ) {
             $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
                        
         }
         
         return ($results);
    }
    
   
    
    function addData ($n, $cD, $cB, $bP, $yP) {
        global $db;
        
        $stmt = $db->prepare("INSERT INTO DogFood (name, cupsADay, cupsInBag, priceOfBag, yearPrice) VALUES( \"". $n ."\", \"".$cD."\", \"".$cB."\", \"".$bP."\", \"".$yP."\")");

        
            
        if ($stmt->execute() && $stmt->rowCount() > 0) {
            return 'Data Added';
        }
        else{
            return "error";
        }
         
    }
    

    
?>

