<?php include('form_process.php'); ?>
<link rel="stylesheet" href="form.css" type="text/css">
<div class="container">

  <form id="contact" action="<?= $_SERVER['PHP_SELF']; ?>" method="post">
    <h3>Quick Contact</h3>
    <h4>Contact us today, and get reply with in 24 hours!</h4>
  
    <fieldset>
      <input placeholder="Your name" type="text" tabindex="1" name="name" value="<?= $name ?>" autofocus>
      <span class="error"><?= $nameErr ?></span>
    </fieldset>
  
    <fieldset>
      <input placeholder="Your Email Address" type="text" name="email" value="<?= $email ?>" tabindex="2">
      <span class="error"><?= $emailErr ?></span>
    </fieldset>
  
    <fieldset>
      <input placeholder="Your Phone Number" type="text" name="phone" value="<?= $phone ?>" tabindex="3">
      <span class="error"><?= $phoneErr ?></span>
    </fieldset>
  
    <fieldset>
      <input placeholder="Your Web Site starts with http://" type="text" name="website" tabindex="4" value="<?= $website ?>">
      <span class="error"><?= $websiteErr ?></span>
    </fieldset>
  
    <fieldset>
      <textarea placeholder="Type your Message Here...." type="text" name="message" tabindex="5" value="<?= $comment ?>"></textarea>
    </fieldset>
  
    <fieldset>
      <button name="submit" type="submit" id="contact-submit" data-submit="...Sending">Submit</button>
    </fieldset>
  
    <div class="success"><?= $success ?></div>
  </form>
</div>