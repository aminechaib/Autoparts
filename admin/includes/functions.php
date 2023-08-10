<?php 

function url_for($script_path, $x = 'admin') {
    // add the leading '/' if not present
    if($script_path[0] != '/') {
      $script_path = "/" . $script_path;
    }
    if($x == 'admin')
      return WWW_ROOT . $script_path;
    else
      return WWW_ROOT_FRONT . $script_path;
    //var_dump(WWW_ROOT . $script_path);exit;
  }

function u($string="") {
  return urlencode($string);
}

function h($string="") {
  return htmlspecialchars($string);
}

function redirect_to($location) {
  header("Location: " . $location);
  exit;
}

function is_post_request() {
  return $_SERVER['REQUEST_METHOD'] == 'POST';
}

function is_get_request() {
  return $_SERVER['REQUEST_METHOD'] == 'GET';
}

function convertToKilo($n) {
  if($n>=1000000000000) return round(($n/1000000000000),1).'T';
  else if($n>=1000000000) return round(($n/1000000000),1).'B';
  else if($n>=1000000) return round(($n/1000000),1).'M';
  else if($n>=1000) return round(($n/1000),1).'K';

  return number_format($n);
}


////////////////////////Validation functions (check admin class)
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

  function is_blank($value) {
    return !isset($value) || trim($value) === '';
  }

  function has_length_greater_than($value, $min) {
    $length = strlen($value);
    return $length > $min;
  }
  function has_length_less_than($value, $max) {
    $length = strlen($value);
    return $length < $max;
  }
  function has_length_exactly($value, $exact) {
    $length = strlen($value);
    return $length == $exact;
  }

  function has_length($value, $options) {
    if(isset($options['min']) && !has_length_greater_than($value, $options['min'] - 1)) {
      return false;
    } elseif(isset($options['max']) && !has_length_less_than($value, $options['max'] + 1)) {
      return false;
    } elseif(isset($options['exact']) && !has_length_exactly($value, $options['exact'])) {
      return false;
    } else {
      return true;
    }
  }

  function has_unique_username($username, $current_id="0") {
    // Need to re-write for OOP
    $admin = Admin::find_by_username($username);
    if($admin === false ){
      // rah unique 
      return true;
    }else{
      return false;
    }
  }
  function has_unique_phone_number($mobile_phone, $current_id="0") {
    // Need to re-write for OOP
    $admin = Admin::find_by_phone($mobile_phone);
    if($admin === false){
      return true;
    }else{
      return false;
    }
  }
  ///////////////////// Session 

  function require_login(){
    global $session;
    if($session->is_logged_in()){
      return true;

    }else{
        redirect_to(url_for('index.php'));
        return false;
    }
  }
?>