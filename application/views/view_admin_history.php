<!DOCTYPE html>
<html>
<head>
      <title>Admin page</title>
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
          $('.tooltipped').tooltip({delay: 50});
        });
      </script>
      <script type="text/javascript">
        $(document).ready(function(){
        $('.modal-trigger').leanModal();
        });
      </script>
      <script type="text/javascript">
        $(document).ready(function(){
        $('.datepicker').pickadate({
          selectMonths: true,
          selectYears: 1
        });
        });
      </script>
</head>
<body>
<div class="navbar-fixed">
<nav class="green darken-1">
  <div class="nav-wrapper white-text">
    <a href="#!" class="brand-logo center white-text">Admin Page SM Portal</a>
    <ul class="right hide-on-med-and-down">
      <li class="white-text"><i class="fa fa-user left" aria-hidden="true"></i>Welcome, <?php echo $this->session->userdata('fullname');?></li>
      <li><a class="dropdown-button" href="#!" data-activates="dropdown1"><i class="material-icons">more_vert</i></a></li>
    </ul>
  </div>
</nav>
</div>
<div class="container">
<div class="row">
  <div class=""><i class="fa fa-info-circle left" aria-hidden="true"></i>Your created tasks</div>
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
              <b>Sucessfully uploaded at
              <?php echo $tasks->upload_date; echo "<br><br></b>"; ?>
              Message : <br>
              <blockquote>
              <?php echo $tasks->note ?>
              </blockquote>
              <?php 
                }
              ?>
              <?php if ($tasks->status == '0') { ?>
              <p class="right"><a class="waves-effect waves-light red btn"><i class="fa fa-spinner" aria-hidden="true"></i> ON PROGRESS</a>
              <p class="left"><a class="waves-effect waves-light black btn" href="<?php echo site_url('beranda_admin/delete_task/'.$tasks->task_id);?>"><i class="fa fa-trash" aria-hidden="true"></i> DELETE THIS TASK</a>
              <?php }
              else {
               ?>
               <p class="right"><a class="waves-effect waves-light green btn" href="#upload_task"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i></i>STATUS DONE</a>
               <p class="left"><a class="waves-effect waves-light blue btn" href="<?php echo base_url().$tasks->file_path; ?>"><i class="fa fa-download" aria-hidden="true"></i></i>Download</a>
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
<!-- Create new task -->
<div id="create_task" class="modal">
  <div class="modal-content">
    <center><h5>Create new task</h5></center>
    <?php echo form_open("beranda_admin/new_task"); ?>
        <input type="hidden" name="creator" value="<?php echo $this->session->userdata('fullname'); ?>">
        <input type="hidden" name="creator_id" value="<?php echo $this->session->userdata('user_id'); ?>">
        <div class="row margin">
          <div class="input-field col s12">
            <input id="title" name="title" type="text" placeholder="Title of your task">
            <label for="title" class="center-align">Title</label>
          </div>
        </div>
        <div class="row margin">
        <div class="input-field col s12">
          <textarea id="detail_task" name="detail" class="materialize-textarea" placeholder=""></textarea>
          <label for="detail_task">Detail Task</label>
        </div>
        </div>
        <div class="row">
        <div class="input-field col s12">
           <input id="deadline" name="deadline" type="date" class="datepicker">
           <label for="deadline">Pick deadline date</label>
        </div>
        </div>
        <div class="row margin">
          <div class="input-field col s12">
          <select name="receiver">
          <?php 
            foreach($list_member as $key) {
          ?>
              <option value="" disabled selected></option>
              <option value="<?php echo $key->fullname; ?>"><?php echo $key->fullname; ?></option>
          <?php } ?>
          </select>
            <label>Select receiver of this task</label>
          </div>
        </div>
          <button class="btn waves-effect waves-light btn-small right" type="submit" value="Submit">Create
          <i class="material-icons right">send</i>
          </button>
       <?php echo form_close(); ?>
  </div>
</div>
<!-- Dropdown Navbar -->
<ul id="dropdown1" class="dropdown-content">
  <li><a href="<?php echo base_url() ?>index.php/user/logout"></i><b>Log out</b></a></li>
</ul>
<!-- Floating Action Button -->
      <div class="row">
          <div class="fixed-action-btn horizontal" style="bottom: 45px; right: 24px;">
            <a class="btn-floating btn-large red">
              <i class="large material-icons">mode_edit</i>
            </a>
            <ul>
              <li><a class="btn-floating blue tooltipped" data-position="left" data-delay="50" data-tooltip="Logout" href="<?php echo base_url() ?>index.php/user/logout"><i class="fa fa-sign-out" aria-hidden="true"></i></a></li>
              <li><a class="btn-floating yellow tooltipped" data-position="left" data-delay="50" data-tooltip="All created task by alumni" href="<?php echo base_url() ?>index.php/beranda_admin/all_tasks"><i class="fa fa-globe" aria-hidden="true"></i></a></li>
              <li><a class="btn-floating green tooltipped modal-trigger" data-position="left" data-delay="50" data-tooltip="Create new task" href="#create_task"><i class="fa fa-plus" aria-hidden="true"></i></a></li>
            </ul>
          </div>
      </div>
</body>
</html>