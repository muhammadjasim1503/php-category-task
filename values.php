<?php

$conn = new mysqli('localhost','root', '', 'phpoop_3');

$query = "SELECT * from products Where 1 ";
// price BETWEEN '". $_POST['min'] ."' AND '". $_POST['max'] ."'";

$output=$query;

if (isset($_POST['category'])){
    $hardware_filter = implode("','", $_POST['category']);
    $query .= "AND category_id IN( '$hardware_filter')";
}

$res = $conn->query($query);
if ($res->num_rows>0){
    $output = $res->fetch_all(MYSQLI_ASSOC);
}

foreach($output as $o){
    echo '
    <p>'. $o['title'].'</p>
    ';
}