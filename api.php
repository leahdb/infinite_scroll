<?php
include('conn.php');
$myArray = array();
$myRow = array();

if(empty($_POST['iload'])){         //this is request variable so it's under post(if iload in empty)
    $vlimit = 1;
}
else{
    $vlimit = $_POST['iload'];
}

if(isset($_POST['oset'])){         //checks whether the variable oset is set ///and is not NULL
   $oset = $_POST['oset'];
}
else{
   $oset=0;
}

$myArray['vlimit'] = $vlimit;
$myArray['oset'] = $oset;

$query = "SELECT * FROM `bposts` ORDER BY id ASC LIMIT ".$vlimit." OFFSET ".$oset;
$myArray['query']=$query;
$result = $link->query($query);


//fetch : Returns an array of values that corresponds to the fetched (récupéré) row or null if there are no more rows in result set.


//hek we loop and build up the array of content la2en it return rows
while($row = $result->fetch_array()){
    $myRow[] = array(
        "id" => $row['id'],
        "content" => $row['content'],
        "date" => $row['date']
    );
}

$myArray['content'] = $myRow; //b2alba l array of content that is returned for

echo json_encode($myArray);  //to encode an associative array into a JSON object
