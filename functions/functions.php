<?php
function confirm_passwords_match($pass, $confirm_pass) {
  if($pass !== $confirm_pass)
    die("Password do not match");
}

function format_chars($name) {
  $name = filter_var($name, FILTER_SANITIZE_STRING);
  $name = strtolower(str_replace(' ', '', $name));
  return $name;
}

function format_email($email_address) {
  $email_address = filter_var($email_address, FILTER_SANITIZE_EMAIL);
  $email_address = strtolower(str_replace(' ', '', $email_address));
  return $email_address;
}

// This function causes stack error
/*
function hash_password($pass) {
  return hash_password($pass, PASSWORD_BCRYPT);
}
 */

?>
