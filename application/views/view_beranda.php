<!DOCTYPE html>
<html>
<head>
      <title>Beranda member</title>
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
      <script type="text/javascript">
        $(document).ready(function(){
        $('.modal-trigger').leanModal();
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
<div class="container">
<div class="row">
  <h5><div class="">Have you ever done your task below?</div></h5>
</div>

    <?php 
        foreach($tasks as $tasks) {
      ?>
    <div class="row">
      <div class="col l12">
        <div class="card">
            <div class="card-content">
              <span class="card-title activator grey-text text-darken-4"><b><?php echo $tasks->title ?></b></span><br>
              <span>Task created by  : <?php echo $tasks->creator ?> at <?php echo $tasks->created ?><br>To : <?php echo $tasks->receiver ?> | <?php echo $tasks->division ?> | Deadline at <?php echo $tasks->deadline ?> <br> 
              </span><br>
              <blockquote>
              <?php echo $tasks->detail ?>
              </blockquote>
              <?php if ($tasks->status == '1') { ?>
              Sucessfully uploaded at
              <?php echo $tasks->upload_date; } ?><br><br>
              <?php if ($tasks->status == '0') { ?>
              <p class="right"><a class="waves-effect waves-light btn blue modal-trigger" href="#upload_task"><i class="fa fa-upload" aria-hidden="true"></i> Upload Task</a>
              <?php }
              else {
               ?>
               <p class="right"><a class="waves-effect waves-light green btn"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i></i>STATUS DONE</a>
               <p class="left"><a class="waves-effect waves-light blue btn modal-trigger" href="<?php echo $tasks->file_path; ?>"><i class="fa fa-download" aria-hidden="true"></i></i>Download</a>
               <?php
             }
               ?>
            </div>
            <br><br>
        </div>
      </div>
      </div>
      <?php } ?>

<!-- Upload task -->
<div id="upload_task" class="modal">
  <div class="modal-content">
    <center><h5>Upload task</h5></center>
    <?php echo form_open_multipart("beranda/upload_file"); ?>
        <input type="hidden" name="upload_date" value="<?php echo date("Y-m-d H:i:s") ?>">
        <div class="row">
          <div class="input-field col s12">
          <select name="task_id">
          <?php 
            foreach($tasks_title as $tasks) {
          ?>
              <option value="<?php echo $tasks->task_id; ?>"><?php echo $tasks->title; ?></option>
          <?php } ?>
          </select>
            <label>Select title</label>
          </div>
        </div>
        <div class="row">
            <div class="col s12 l12">
            <div class="file-field input-field">
                <div class="btn">
                  <span>File</span>
                  <input type="file" name="userfile" value="<?php echo set_value('userfile'); ?>">
                </div>
                <div class="file-path-wrapper">
                  <input class="file-path validate" type="text" placeholder="Upload your file">
                </div>
            </div>
            </div>  
        </div>
        <div class="input-field col s12">
          <textarea id="note" name="note" class="materialize-textarea"></textarea>
          <label for="note">Message</label>
        </div>
        </div>
          <button class="btn waves-effect waves-light btn-small right" type="submit" value="Submit">Submit
          <i class="material-icons right">send</i>
          </button><br><br><br>
       <?php echo form_close(); ?>
  </div>
</div>

</div>
<!-- Floating Action Button -->
      <div class="row">
          <div class="fixed-action-btn horizontal" style="bottom: 45px; right: 24px;">
            <a class="btn-floating btn-large red">
              <i class="fa fa-plus" aria-hidden="true"></i>
            </a>
            <ul>
              <li><a class="btn-floating blue tooltipped" data-position="left" data-delay="50" data-tooltip="Logout" href="<?php echo base_url() ?>index.php/user/logout"><i class="fa fa-sign-out" aria-hidden="true"></i></a></li>
              <li><a class="btn-floating yellow tooltipped" data-position="left" data-delay="50" data-tooltip="All member tasks" href="<?php echo base_url() ?>index.php/beranda/all_task"><i class="fa fa-globe" aria-hidden="true"></i></a></li>
            </ul>
          </div>
      </div>
</body>
</html>