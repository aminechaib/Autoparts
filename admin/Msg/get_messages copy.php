
  <?php
require_once("../includes/initialize.php");
if (isset($_GET['msg_id'])) {
  $msg_id = $_GET['msg_id'];
}
$msg= Msg_sent::find_by_id_cl($msg_id);
// var_dump($ord);
if ($msg) {
    foreach ($msg as $msgs) {
    ?>
    <style>
  .message-container {
  display: flex;
  flex-direction: column;
  border-radius: 10px;
  margin-bottom: 10px;
}

.message {
  padding: 10px;
  background-color: #fff;
  border-radius: 10px;
}

.left-message {
  background-color: #0099ff;
  text-align: left;
}

.right-message {
  background-color: #f44336;
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
</body>
    <?php
    
    
    
    }}
?>
