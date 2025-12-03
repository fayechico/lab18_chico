<?php

include 'connectdb.php';


function getAllCustomers(){
    $conn = Connect();

    $query = 'SELECT * FROM customer';
    $result = $conn->query($query); 
    $data=[]; //data set
    while($row = $result->fetch_assoc()){
        $data[] = $row;
    }
    $conn->close();
    return $data;
}


function findCustomers($find){
    $conn = Connect();

    
    $query = "SELECT * FROM customer WHERE cus_lname LIKE '%$find%' OR cus_fname LIKE '%$find%'";
    $result = $conn->query($query); 
    $data=[]; 
    while($row = $result->fetch_assoc()){
        $data[] = $row;
    }
    $conn->close();
    return $data;
}


function deleteCustomer($cuscode){
    $conn = Connect();

    $query = "DELETE FROM customer WHERE cus_code='$cuscode'";
    $result = $conn->query($query); 
    $conn->close();
    if($result) return true; 
    
    return false;
}


function addCustomer($cus_code, $lname, $fname, $initial, $areacode, $phone, $balance){
    $conn = Connect();
    
    
    $initial_val = $initial === '(NULL)' ? 'NULL' : "'$initial'";
    
    
    $query = "INSERT INTO customer
                (cus_code, cus_lname, cus_fname, cus_initial, cus_areacode, cus_phone, cus_balance)
                VALUES
                ('$cus_code', '$lname', '$fname', $initial_val, '$areacode', '$phone', $balance)";
    $result = $conn->query($query); 
    $conn->close();
    if($result) return true; 
    
    return false;
}