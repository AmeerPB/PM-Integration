<?php
//defining variables

$name  = $email = $phone  = $website = "";
$nameErr = $emailErr = $phoneErr  = $websiteErr = "";

//  form validation methods

if ($_SERVER[REQUEST_METHOD] == "POST") {
    if (empty($_POST["name"])) {
        $nameErr = "Name is required";
    } else {
        $name = _inputStripper($_POST['name']);
        // check name value 
        if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
            $nameErr = "Only letters and white spaces are allowed";
        }
    }

    // email check
    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
    } else {
        $email = _inputStripper($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "invalid email format";
        }
    }

    //phone number check
    if (empty($_POST["phone"])) {
        $phoneErr = "phone number is required";
    } else {
        $phone = _inputStripper($_POST["phone"]);
        // if (!preg_match("/^(\d[\s-]?)?[\(\[\s-](0,2}?\d{3}[\)\]\s-]{0,2}?\d{3}[\s-]?\d{4}$/i",$phone))  {
        //     $phoneErr = "Invalid phone number";
        // }
    }

    // website check
    if (empty($_POST["website"])) {
        $websiteErr = "website is required";
    } else {
        $website = _inputStripper($_POST["website"]);
        // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
        if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i", $website)) {
            $websiteErr = "Invalid URL";
        }
    }

    // comment check
    if (empty($_POST["comment"])) {
        $comment = "comment is required";
    } else {
        $comment = _inputStripper($_POST["comment"]);
    }
    // check errors are empty
    if ($nameErr == '' and $emailErr == '' and $phoneErr == '' and $websiteErr == '') {
        $message_body = "";
        unset($_POST['submit']);
        foreach ($_POST as $key =>  $value) {
            $message_body .= "$key: $value\n";
        }

        $to = 'root@phpserver';
        $subject = 'contact form';
        if (mail($to, $subject, $message)) {
            $success = "Message sent";
            $name = $email = $phone = $website = $comment = "";
        }
    }
}

function _inputStripper($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
