<?php
if(isset($_POST['email'])) {
 
    // EDIT THE 2 LINES BELOW AS REQUIRED
    $email_to = "cnitsch@sdsu.edu";
    $email_subject = "Miracles Birthday Request Form";
 
    function died($error) {
        // your error code can go here
        echo "We are very sorry, but there were error(s) found with the form you submitted. ";
        echo "These errors appear below.<br /><br />";
        echo $error."<br /><br />";
        echo "Please go back and fix these errors.<br /><br />";
        die();
    }
 
 
    // validation expected data exists
    if(!isset($_POST['first_name']) ||
        !isset($_POST['last_name']) ||
        !isset($_POST['email']) ||
        !isset($_POST['comments'])) {
        died('We are sorry, but there appears to be a problem with the form you submitted.');       
    }
 
     
 
    $first_name = $_POST['first_name']; // required
    $last_name = $_POST['last_name']; // required
    $email_from = $_POST['email']; // required
    $comments = $_POST['comments']; // required
 
    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
 
  if(!preg_match($email_exp,$email_from)) {
    $error_message .= 'The Email Address you entered does not appear to be valid.<br />';
  }
 
    $string_exp = "/^[A-Za-z .'-]+$/";
 
  if(!preg_match($string_exp,$first_name)) {
    $error_message .= 'The First Name you entered does not appear to be valid.<br />';
  }
 
  if(!preg_match($string_exp,$last_name)) {
    $error_message .= 'The Last Name you entered does not appear to be valid.<br />';
  }
 
  if(strlen($comments) < 2) {
    $error_message .= 'The Comments you entered do not appear to be valid.<br />';
  }
 
  if(strlen($error_message) > 0) {
    died($error_message);
  }
 
    $email_message = "Form details below.\n\n";
 
     
    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }
 
      
    $email_message .= "First Name: ".clean_string($first_name)."\n";
    $email_message .= "Last Name: ".clean_string($last_name)."\n";
    $email_message .= "Email: ".clean_string($email_from)."\n";
    $email_message .= "Comments: ".clean_string($comments)."\n";
 
// create email headers
$headers = 'From: '.$email_from."\r\n".
'Reply-To: '.$email_from."\r\n" .
'X-Mailer: PHP/' . phpversion();
@mail($email_to, $email_subject, $email_message, $headers);  
?>
 
<!-- include your own success html here. Use w3school.com for the full page image -->
 
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body, html {
  height: 100%;
  margin: 0;
}

.bg {
  /* The image used */
  background-image: url("img_girl.jpg");

  /* Full height */
  height: 50%; 

  /* Center and scale the image nicely */
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
}
<html>

<head>

<meta name="viewport" content="width=device-width, initial-scale=1">

<style>

body, html {

  height: 100%;

  margin: 0;

  font: 400 15px/1.8 "Lato", sans-serif;

  color: #777;

}



.bgimg-1, .bgimg-2, .bgimg-3 {

  position: relative;

  opacity: 0.65;

  background-position: center;

  background-repeat: no-repeat;

  background-size: cover;



}

.bgimg-1 {

  background-image: url("submissionbg.jpeg");

  height: 100%;

}



.caption {

  position: absolute;

  left: 0;

  top: 50%;

  width: 100%;

  text-align: center;

  color: #000;

}



.caption span.border {
    background-color: #598781;
    color: #fff;
    padding: 18px;
    font-size: 25px;
    letter-spacing: 10px;
}



h3 {

  letter-spacing: 5px;

  text-transform: uppercase;

  font: 20px "Lato", sans-serif;

  color: #111;

}

.caption .border a {
    color: #120007;
}
.caption .border a:hover  {
    color: #EE9D65;
}
</style>

</head>

<body>



<div class="bgimg-1">

  <div class="caption">

    <span class="border">Thank you for your Submission</span><br><br>

    <span class="border"><a href="BusinessPage1.html" title="Click here to return to Home Page" target="_parent">Click here to return to Home Page</a></span>

  </div>

</div>

</body>

</html>

 
<?php
}
?>
 