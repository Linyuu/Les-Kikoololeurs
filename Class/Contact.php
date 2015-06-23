<!DOCTYPE HTML>
<html>
    <head>

            <title>Contact</title>
            <meta charset="utf-8" />
            <link rel="stylesheet" type="text/css" media="all" href="css/bootstrap.min.css" />
            <link rel="stylesheet" type="text/css" media="all" href="css/style.css" />
            <link rel="stylesheet" type="text/css" media="all" href="css/carousel.css" />
            <link rel="icon" type="image/png" href="images/favicon.png" />
            <meta http-equiv="X-UA-Compatible" content="IE=edge" />
            <meta name="viewport" content="width=device-width, initial-scale=1" />
    </head>
<body>
<?php
Function contact (){


    $to = "sebastien.bayle124@gmail.com";
    $from = $_REQUEST['email'];
    $name = $_REQUEST['name'];
    $headers = "From: $from";
    $subject = "You have a message sent from your site";

    $fields = array();
    $fields{"name"} = "name";
    $fields{"email"} = "email";
    $fields{"phone"} = "phone";
    $fields{"message"} = "message";

    $body = "Here is what was sent:\n\n"; foreach($fields as $a => $b){   $body .= sprintf("%20s: %s\n",$b,$_REQUEST[$a]); }

    $send = mail($to, $subject, $body, $headers);

?>

<form id="contact" name="contact" method="post">
    <fieldset>
        <label for="name" id="name">Name<span class="required">*</span></label>
        <input type="text" name="name" id="name" size="30" value="" required/>

        <label for="email" id="email">Email<span class="required">*</span></label>
        <input type="text" name="email" id="email" size="30" value="" required/>

        <label for="phone" id="phone">Phone</label>
        <input type="text" name="phone" id="phone" size="30" value="" />

        <label for="Message" id="message">Message<span class="required">*</span></label>
        <textarea name="message" id="message" required></textarea>

        <label for="Captcha" id="captcha">Name the small house pet that says "<i>meow</i>"<span class="required">*</span></label>
        <input type="text" name="captcha" value="" required/>

        <input id="submit" type="submit" name="submit" value="Send" />
    </fieldset>
</form>

<div id="success">
  <span>
    <p>Votre message a été correctement envoyé</p>
  </span>
</div>

<div id="error">
  <span>
    <p>Quelque chose s'est mal passé, le message n'a pas été envoyé</p>
  </span>
</div>
<?php


}
?>
</body>
</html>