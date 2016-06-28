<!DOCTYPE html>
<html>
<head>
      <title>All tasks</title>
      <link rel='shortcut icon' type='image/x-icon' href='<?php echo base_url();?>assets/cnc.ico' />
      <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/materialize.css">
      <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/custom.css">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
      <link rel="stylesheet" href="<?php echo base_url();?>assets/font_awesome/css/font-awesome.min.css">
      <link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
      <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      <script src="<?php echo base_url();?>assets/js/materialize.js"></script>
      <script type="text/javascript">
        $(document).ready(function() {
        $('select').material_select();
      });
      </script>
</head>
<body>
<div class="navbar-fixed">
<nav class="green darken-1">
  <div class="nav-wrapper white-text">
    <a href="#!" class="brand-logo center white-text">Senior Member Portal</a>
    <ul class="right hide-on-med-and-down">
      <li class="white-text"><i class="fa fa-user left" aria-hidden="true"></i>Welcome, <?php echo $this->session->userdata('fullname');?></li>
      <li><a class="dropdown-button" href="#!" data-activates="dropdown1"><i class="material-icons">more_vert</i></a></li>
    </ul>
  </div>
</nav>
<!-- Dropdown Navbar -->
<ul id="dropdown1" class="dropdown-content">
  <li><a href="<?php echo base_url() ?>index.php/user/logout"></i><b>Log out</b></a></li>
</ul>
</div>
</div>
<div class="container">
<div class="row">
  <h5><div class="">Below are all member's tasks</div></h5>
</div>

    <?php 
        foreach($tasks as $tasks) {
      ?>
    <div class="row">
      <div class="col l12">
        <div class="card">
            <div class="card-content">
              <span class="card-title activator grey-text text-darken-4"><b><?php echo $tasks->title ?></b></span><br>
              <span>Task created by  : <?php echo $tasks->creator ?> at <?php echo $tasks->created ?><br>To : <?php echo $tasks->receiver ?> | Deadline at <?php echo $tasks->deadline ?> <br> 
              </span><br>
              <blockquote>
              <?php echo $tasks->detail ?>
              </blockquote>
              <?php if ($tasks->status == '1') { ?>
              <b>Sucessfully uploaded at
              <?php echo $tasks->upload_date; } ?><br><br></b>
              <?php if ($tasks->status == '0') { ?>
              <p class="right"><a class="waves-effect waves-light btn red"><i class="fa fa-spinner" aria-hidden="true"></i>ON PROGRESS</a>
              <?php }
              else {
               ?>
               <p class="right"><a class="waves-effect waves-light green btn"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i></i>STATUS DONE</a>
               <?php
             }
               ?>
            </div>
            <br><br>
        </div>
      </div>
      </div>
      <?php } ?>

</div>
<!-- Floating Action Button -->
      <div class="row">
          <div class="fixed-action-btn horizontal" style="bottom: 45px; right: 24px;">
            <a class="btn-floating btn-large red">
              <i class="fa fa-plus" aria-hidden="true"></i>
            </a>
            <ul>
              <li><a class="btn-floating blue tooltipped" data-position="left" data-delay="50" data-tooltip="Logout" href="<?php echo base_url() ?>index.php/user/logout"><i class="fa fa-sign-out" aria-hidden="true"></i></a></li>
              <li><a class="btn-floating green tooltipped" data-position="left" data-delay="50" data-tooltip="My tasks" href="<?php echo base_url() ?>index.php/beranda"><i class="fa fa-history" aria-hidden="true"></i></a></li>
            </ul>
          </div>
      </div>
</body>
</html>