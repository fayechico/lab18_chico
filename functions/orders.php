<?php

include 'connectdb.php';

function getAllOrders(){
    $conn = Connect();

    $query = "SELECT invoice.*, customer.cus_fname, customer.cus_lname
              FROM invoice
              INNER JOIN customer 
              ON invoice.cus_code = customer.cus_code
              ORDER BY invoice.inv_number ASC";


    $result = $conn->query($query); 
    $data=[]; //data set
    while($row = $result->fetch_assoc()){
        $data[] = $row;
    }
    $conn->close();
    return $data;
}


