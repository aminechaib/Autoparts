
<?php require_once('includes/initialize.php') ;



$errors = [];
$username = '';
$password = '';

if(is_post_request()) {

  $phone_number = $_POST['phone_number'] ?? '';
  $password = $_POST['password'] ?? '';

  // Validations
  if(is_blank($phone_number)) {
    $errors[] = "numéro de téléphone est vide!";
  }
  if(is_blank($password)) {
    $errors[] = "mot de passe est vide!";
  }

  // if there were no errors, try to login
  if(empty($errors)) {
    $admin = Admin::find_by_phone($phone_number);
    
    // test if admin found and password is correct
    if($admin != false && $admin->verify_password($password)) {
      // Mark admin as logged in
      $session->login($admin);
      redirect_to(url_for('dashboard.php'));
    } 
    else {
      // phone_number not found or password does not match
      $errors[] = "mot de passe ou numéro de téléphone erroné :/ ";
    }

  }

 // var_dump($errors);
}

?>



<!DOCTYPE html>
<html>
<head>
  <!-- Standard Meta -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

  <!-- Site Properties -->
  <title>Login</title>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href='dist/semantic.css'>
    <script src="dist/jquery-3.3.1.min.js"></script> 

  <style type="text/css">
    body {
        background-image:url(<?php echo url_for('images/autparts.jpg'); ?>);
        background-repeat:no-repeat;
        background-size:cover;
    }
    body > .grid {
      height: 100%;
    }
    .image {
      margin-top: -100px;
    }
    .column {
      max-width: 500px;
    }
    .ui.raised.segment.grid {
    padding: 10px;
    }
    .field{
      width:100%;
    }
    .fa {
      position:absolute;
      left:425px;
      top:12px;
      font-size:17px;
      cursor:pointer;
      color:#999;
    }
    .fa.active{
      color:red;
    }
  </style>
  
</head>
<body>

<div class="ui middle aligned center aligned grid">
  <div class="column">
  
    <form class="ui large form" method="POST">
    
      <div class="ui raised segment grid">

            <div class="centered row">
              <img src="<?php echo url_for('images/logo.png') ?>" class="">
            </div>
            <div class="row">
                <h2 class="ui blue image header centered row">
                  <div class="content">
                      Se connecter
                  </div>
                </h2>
            </div>
            <div class="row">
                <div class="field ">
                    <div class="ui left icon input">
                      <i class="user icon"></i>
                      <input type="text" name="phone_number" placeholder="numéro de téléphone">
                    </div>
                </div>
            </div>
                <div class="row">
                    <div class="field ">
                        <div class="ui left icon input">
                        <i class="lock icon"></i>
                        <i class="fa fa-eye" id="eye"></i>
                        <input type="password" id="pdw" name="password" placeholder="mot de passe">
                    </div>
                </div>
              </div>

                <div class="row">
                
                  <input type="submit" name="ok" value="Connecter" class="ui blue submit button ">
                                 
                </div>            
      </div>

      <div class="<?php if(!empty($errors)){ echo 'ui negative message'; ?>">
        <i class="close icon"></i>
        <div class="header">
        </div>
        <ul class="list">
                        
        <?php
            foreach ($errors as $error) {
              echo '<li>'. $error . '</li>';
            }
        }
        ?>
        </ul>
      </div>
    </form>
 
  </div>
  
</div>

<script src="dist/semantic.min.js"></script>


<script>
  var pdw = document.getElementById('pdw');
  var eye = document.getElementById('eye');

  eye.addEventListener('click',togglePass);
  
  function togglePass(){
      eye.classList.toggle('active');

      (pdw.type == 'password') ? pdw.type = 'text' :
      pdw.type = 'password';
      console.log('9asso');
  }


</script>

  



</body>

</html>
