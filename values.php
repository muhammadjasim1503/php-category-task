<?php

$conn = new mysqli('localhost','root', '', 'phpoop_3');

$query = "SELECT * from products Where 1 ";

// $output=$query;

if (isset($_POST['category'])){
    $hardware_filter = implode("','", $_POST['category']);
    $query .= "AND category_id IN( '$hardware_filter') ";
} if( isset($_POST['min'], $_POST['max']) && !empty($_POST['min']) && !empty($_POST['max']) ){
    $query .= "AND price BETWEEN '". $_POST['min'] ."' AND '". $_POST['max'] ."' ";
}

$res = $conn->query($query);
if ($res->num_rows>0){
    $row = $res->fetch_all(MYSQLI_ASSOC);
    $output = "
    <table>
        <thead>
            <tr>
                <th>Title</th>
                <th>Price</th>
            </tr
        </thead>
        <tbody>";
            
    
    foreach($row as $r){
        $output .= "
        <tr>
            <td> ".$r['title']."</td>
            <td> ".$r['price']."</td>
        </tr>";
    }
    $output .= "
    </tbody>
    </table>";
    echo $output;
} else {
    $output = 'No record Found';
    echo $output;
}
