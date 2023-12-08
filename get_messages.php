<?php
include('layouts/head.php'); 
if (isset($_SESSION['client'])) {
    $id = $_SESSION['client']->id;}
$msg= Msg_sent::find_by_id_cl($id);
// var_dump($ord);
if ($msg) {
    foreach ($msg as $msgs) {
    ?>
    <style>
  .message-container {
    display: flex;
    justify-content: space-between;
  }
  .left-message {
    text-align: left;
  }
  .right-message {
    text-align: right;
  }
</style>
</head>
<body>
<div class="message-container">
  <div class="left-message">
    <?php echo $msgs->msg_cl; ?>
  </div>
  <div class="right-message">
    <?php echo $msgs->msg_ad; ?>
  </div>
</div>
    <?php
    
    
    
    }}
?>
