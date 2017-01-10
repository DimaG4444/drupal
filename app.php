<?php
function clean($value = "") {
    $value = trim($value);
    $value = stripslashes($value);
    $value = strip_tags($value);
    $value = htmlspecialchars($value);
    
    return $value;
}
function check_length($value = "", $min, $max) {
    $result = (mb_strlen($value) < $min || mb_strlen($value) > $max);
    return !$result;
}
if($_SERVER['REQUEST_METHOD'] == 'POST') {	
	$name = $_POST['n'];
	$email = $_POST['e-mail'];
	$name = clean($name);
	$email = clean($email);
	if(!empty($name) && !empty($email)){
		$email_validate = filter_var($email, FILTER_VALIDATE_EMAIL); 
	    if(check_length($name, 2, 25) && $email_validate) {
	        echo "Спасибі за повідомлення";
	    } else {
	        echo "Введенні данні некорректні";
	    }
	} else {
	    echo "Заповніть пусті поля";
	}
} else {
	header("Location: ../index.php");
}
	
