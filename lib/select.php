<?php

function selectData() {
    $connect_database = mysqli_connect("localhost", "root", "", "tgroba");
    $select_country = "SELECT * FROM `countries` ";
    $query = mysqli_query($connect_database, $select_country);

    $countries = [];
    while($res = mysqli_fetch_assoc($query)) {
        $countries[] = $res;
    }
    return $countries;
}


function addPost($post1, $post2) {
    $connect_database = mysqli_connect("localhost", "root", "", "tgroba");
    $insert_item = "INSERT INTO `post` (`post 1`, `post 2`) VALUES ('$post1', '$post2')";
    
    mysqli_query($connect_database, $insert_item);
    
    $result = mysqli_affected_rows($connect_database);
    if($result == 1) {
        return true;
    } else {
        return false;
    }
}

function addCountry($from_country, $to_country) {
    $connect_database = mysqli_connect("localhost", "root", "", "tgroba");
    $insert_item = "INSERT INTO `country` (`from_country`, `to_country`) VALUES ('$from_country', '$to_country')";
    
    mysqli_query($connect_database, $insert_item);
    
    $result = mysqli_affected_rows($connect_database);
    if($result == 1) {
        return true;
    } else {
        return false;
    }
}

function selectCountry($from_country, $to_country) {
    $connect_database = mysqli_connect("localhost", "root", "", "tgroba");
    $select_country = "SELECT * FROM `country` WHERE `from_country` = '$from_country' && `to_country` = '$to_country' ";
    $query = mysqli_query($connect_database, $select_country);

    $countries = [];
    while($res = mysqli_fetch_assoc($query)) {
        $countries[] = $res;
    }
    return $countries;
}


function addDimensions($weight, $length, $width, $height) {
    $connect_database = mysqli_connect("localhost", "root", "", "tgroba");
    $insert_item = "INSERT INTO `dimensions` (`weight`, `length`, `width`, `height`) VALUES ('$weight', '$length', '$width', '$height')";
    
    mysqli_query($connect_database, $insert_item);
    
    $result = mysqli_affected_rows($connect_database);
    if($result == 1) {
        return true;
    } else {
        return false;
    }
}

function selectDimensions($weight, $length, $width, $height) {
    $connect_database = mysqli_connect("localhost", "root", "", "tgroba");
    $select_country = "SELECT * FROM `dimensions` WHERE `weight` = '$weight' && `length` = '$length' && `width` = '$width' && `height` = '$height' ";
    $query = mysqli_query($connect_database, $select_country);

    $countries = [];
    while($res = mysqli_fetch_assoc($query)) {
        $countries[] = $res;
    }
    return $countries;
}

function addNewUser($first_name, $last_name, $email1, $email2, $address1, $address2, $phone1, $phone2, $company1, $company2) {
    $connect_database = mysqli_connect("localhost", "root", "", "tgroba");
    $insert_item = "INSERT INTO `about` (`first_name`, `last_name`, `email1`, `email2`, `address1`, `address2`, `phone1`, `phone2`, `company1`, `company2`) VALUES ('$first_name', '$last_name', '$email1', '$email2', '$address1', '$address2', '$phone1', '$phone2', '$company1', '$company2')";
    
    mysqli_query($connect_database, $insert_item);
    
    $result = mysqli_affected_rows($connect_database);
    if($result == 1) {
        return true;
    } else {
        return false;
    }
}

?>