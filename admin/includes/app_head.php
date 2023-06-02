<?php 
require_once("initialize.php");
require_login();

if(!isset($page_title)){
   $page_title = 'Autparts';
  };
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $page_title; ?></title>
    <link rel="stylesheet" type="text/css" href="<?php echo url_for('dist/semantic.css') ;?>">
    <script src="<?php echo url_for('dist/jquery-3.3.1.min.js');?>"></script>
    
    <script src="<?php echo url_for('dist/semantic.js') ?>"></script>
    <link rel="stylesheet" href="<?php echo url_for('dist/lightbox.css'); ?>">

    <style>
      html, body{
        height: 100%;
        /* background-image: url('<?php echo  url_for("images/prism.png"); ?>')*/
        background-color: #e9ebee; */
      }
      /* menu */
      .leftbar {
        position: fixed;
        top: 0;
        left: 0;
        height: 100%;
        width: 80px; /*default width*/
        background-color: #363535  ;
        transition: width 0.4s;
        z-index: 1000;
        overflow: hidden;
      }
      #leftbar-toggle{
        color:white;
        padding: 15px 27px 20px;
        display: inline-block;
        width: 50px;
      }
      .leftbar .ui.link.list .item {
        padding: 25px 0 15px;
      }

      .leftbar .ui.link.list .item .icon, .leftbar .ui.link.list .item .content {
        color: white;
      }

      .leftbar .ui.link.list .item:hover {
        background-color:rgb(255,255,255,0.3);
      }

      .leftbar .ui.link.list .item:hover .icon, .leftbar .ui.link.list .item:hover .content {
        color: black;
      }

      .leftbar .ui.link.list .item.active {
        background-color: black;
      }

      .leftbar .ui.link.list .item.active .icon, .leftbar .ui.link.list .item.active .content {
        color: white;
      }
      
      .leftbar .ui.link.list .item .icon {
        padding-right: 0;
      }

      .leftbar .ui.link.list .item .icon::before {
        display: inline-block;
        width: 80px;
      }
      .ui .middle.aligned.link .list .content{
        
      }
      .page {
        transform: translateX(0);
        transition: margin-left 0.4s, transform 0.4s;
        padding-left: 80px;
        padding-top: 5%;

      }
      /* css toggle example "2" */
      
      body.opened .leftbar {
        width: 200px;
        max-height: 100vh;
        overflow: scroll;
      }
      .ui.card {
          
          width: 100%;
      }

      
      /* #head{
        
          width: 100%;
          background-color: white;
          border-bottom: 1px solid gray;
          height: 66px;
      }
      .power.off {
          border-left: 1px solid;
          padding-left: 10px;
          margin-left: 10px;
      }
      .user_session {
          display: inline-block;
          float: right;
          margin-right: 15px;
          margin-top: 0px;
      } */

    
    </style>
  </head>

  <body>
    
  <div class="leftbar">
      <div class="ui middle aligned link list">
        
        <a class="" id="leftbar-toggle" href="#">
          <i class="sidebar small icon"></i>
        </a>
        
    
        <?php
        if($_SESSION['admin']->role == 'super-admin') 
        { echo '
            <a class="item open_ad bar" href="';?><?php echo url_for("admins/index.php"); ?><?php echo '">';?>
              <?php echo '<i class="user small icon"></i>
              <div class="content">Admins</div>
            </a>
        ';
        }
        ?>
        
        
        <a class="item open_dash bar" href="<?php echo url_for('dashboard.php'); ?>">
          <i class="home small icon"></i>
          <div class="content">Accueil</div>
        </a>
        <a class="item open_cl" href="<?php echo url_for('clients/index.php'); ?>">
          <i class="users small icon"></i>
          <div class="content">Client</div>
        </a>
        <a class="item open_cat" href="<?php echo url_for('categories/index.php'); ?>">
            <i class="cogs icon small icon"></i>
            <div class="content">Category</div>
          </a>

          <a class="item open_mot" href="<?php echo url_for('moteur/index.php'); ?>">
            <i class="car icon small icon"></i>
            <div class="content">Moteur</div>
          </a>
          <a class="item open_mar" href="<?php echo url_for('mark/index.php'); ?>">
              <i class="database small icon"></i>
              <div class="content">marque</div>
            </a>
            <a class="item open_mod" href="<?php echo url_for('model/index.php'); ?>">
              <i class="database small icon"></i>
              <div class="content">model</div>
            </a>
           
              <a class="item open_piece" href="<?php echo url_for('piece/index.php'); ?>">
              <i class="file alternate outline small icon"></i>
                  <div class="content">piece</div>
                </a>
               
        <a class="item open_comp" href="<?php echo url_for('compatible/index.php'); ?>">
        <i class="small boxes icon"></i>
                  <div class="content">Compatible</div>
                </a>
               
      </div>      
    </div>
    <!-- end leftbar -->    
