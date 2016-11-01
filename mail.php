<?php
if(isset($_POST["submit"])){
// Checking For Blank Fields..
if($_POST["vname"]==""||$_POST["vemail"]==""||$_POST["sub"]==""||$_POST["msg"]==""){
    echo '<div class="error error-primary" style="    position: fixed;
    bottom: 10px;
    right: 23px;
    z-index: 1000;">';
echo "<strong>Error!</strong> Please fill all fields.</div>";
}else{
// Check if the "Sender's Email" input field is filled out
$email=$_POST['vemail'];
// Sanitize E-mail Address
$email =filter_var($email, FILTER_SANITIZE_EMAIL);
// Validate E-mail Address
$email= filter_var($email, FILTER_VALIDATE_EMAIL);
if (!$email){
    echo '<div class="error error-primary" style="    position: fixed;
    bottom: 10px;
    right: 23px;
    z-index: 1000;">';
echo "<strong>Error!</strong> Invalid Sender's Email</div>";
}
else{
$subject = $_POST['sub'];
$message = $_POST['msg'];
$headers = 'From:'. $email . "\r\n"; // Sender's Email
$headers .= 'Cc:'. $email . "\r\n"; // Carbon copy to Sender
// Message lines should not exceed 70 characters (PHP rule), so wrap it
$message = wordwrap($message, 70);
// Send Mail By PHP Mail Function
mail("hr@fasttrainhousekeeping.in", $subject, $message, $headers);
echo '<div class="success success-primary" style="    position: fixed;
    bottom: 10px;
    right: 23px;
    z-index: 1000;">';
echo "Success! We will get back to you as soon as possible.</div>";
}
}
}
?>