<?php
  if (isset($_REQUEST['email']))  {
  
  $admin_email = "admin@lifemace.xyz";
  $email = $_REQUEST['email'];
  $subject = $_REQUEST['subject'];
  $comment = $_REQUEST['comment'];
  
  mail($email, "$subject", $comment, "From:" . $admin_email);
  
  echo "Thank you for contacting us!";
  }
  
  
  else  {
?>

 <form method="post">

  Email: <input name="email" type="text" />

  Subject: <input name="subject" type="text" />

  Message:

  <textarea name="comment" rows="15" cols="40"></textarea>

  <input type="submit" value="Submit" />
  </form>
  
<?php
  }
?>