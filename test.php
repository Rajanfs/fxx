<?php

require('connect.php');

if ($query = mysqli_query($con, "UPDATE users SET email = 'karthikitram@gmail.com' WHERE email = 'kathrikitram@gmail.com'")){
echo 'Done !';
}

$query = mysqli_query($con, "SELECT * FROM users");

while ($fetch = mysqli_fetch_assoc($query)){
    echo '<pre>';print_r($fetch);echo '<pre>';
}