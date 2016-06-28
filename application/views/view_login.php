<!DOCTYPE html>
<html>
<head>
      <title>Login SM Portal</title>
      <link rel='shortcut icon' type='image/x-icon' href='<?php echo base_url();?>assets/cnc.ico' />
      <!-- Compiled and minified CSS -->
      <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/custom.css">
      <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/materialize.css">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
      <link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
      <!-- Compiled and minified JavaScript -->
      <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      <link href="<?php echo base_url();?>assets/css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection">
      <link href="<?php echo base_url();?>assets/css/style.css" type="text/css" rel="stylesheet" media="screen,projection">
    <!-- Custome CSS-->    
    <link href="<?php echo base_url();?>assets/css/custom-style.css" type="text/css" rel="stylesheet" media="screen,projection">
    <!-- CSS style Horizontal Nav (Layout 03)-->    
    <link href="<?php echo base_url();?>assets/css/style-horizontal.css" type="text/css" rel="stylesheet" media="screen,projection">
      <link href="<?php echo base_url();?>assets/css/page-center.css" type="text/css" rel="stylesheet" media="screen,projection">
      <link href="<?php echo base_url();?>assets/css/prism.css" type="text/css" rel="stylesheet" media="screen,projection">
      <script src="http://code.jquery.com/jquery-1.10.2.js"></script>
      <script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
      <!-- For load material icon -->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      <script src="<?php echo base_url();?>assets/js/materialize.js"></script>
      <script type="text/javascript">
    $(document).ready(function() {
    $('select').material_select();
  });
  </script>
</head>

<body class="green darken-1">
  <div id="login-page" class="row">
    <div class="col s12 z-depth-4 card-panel">
      <?php echo form_open("user/login"); ?>
        <div class="row">
          <div class="input-field col s12 center">
            <img src="<?php echo base_url();?>assets/gif/sm_logo.png" width="90">
            <p class="center login-form-text">SENIOR MEMBER CNC PORTAL</p>
          </div>
        </div>
        <div class="row margin">
          <div class="input-field col s12">
            <i class="mdi-social-person-outline prefix"></i>
            <input id="username" name="username" type="text">
            <label for="username" class="center-align">Username</label>
          </div>
        </div>
        <div class="row margin">
          <div class="input-field col s12">
            <i class="mdi-action-lock-outline prefix"></i>
            <input id="password" name="password" type="password">
            <label for="password">Password</label>
          </div>
        </div>
         <div class="row margin center"><br>
          <button class="btn waves-effect waves-light btn-small" type="submit" value="Submit">Login
          <i class="material-icons right">send</i>
          </button>
        </div>
        <div class="row">          
        </div>
       <?php echo form_close(); ?>
       <div class="center"><a href="<?php echo base_url(); ?>index.php/register">Create new account</a></div><br>
    </div>
  </div>



  <!-- ================================================
    Scripts
    ================================================ -->

  <!-- jQuery Library -->
  <script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>
  <!--materialize js-->
  <script type="text/javascript" src="js/materialize.js"></script>
  <!--prism-->
  <script type="text/javascript" src="js/prism.js"></script>
  <!--scrollbar-->
  <script type="text/javascript" src="js/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>

  <!--plugins.js - Some Specific JS codes for Plugin Settings-->
  <script type="text/javascript" src="js/plugins.js"></script>

</body>
</html>