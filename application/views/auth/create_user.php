<?php $this->load->view('auth/header'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Create_User
      <small>User</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">Forms</a></li>
      <li class="active">Create_User</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">

    <div class="row">
     <div class="col-md-8">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Create_User</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <?php echo form_open("index.php/auth/create_user");?>
        <div class="box-body">
          <?php
          if(isset($message))
          {
            ?>
            <div class="alert alert-danger alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
              <h4><i class="icon fa fa-ban"></i> Alert!</h4>
              <?php echo $message;?>
            </div>
            <?php
          }
          ?>
          <div class="form-group">
            <label for="exampleInputEmail1">First Name</label>
            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter First Name" name="first_name">
          </div>

          <div class="form-group">
            <label for="exampleInputEmail1">Last Name</label>
            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Last Name" name="last_name">
          </div>

          <?php
          if($identity_column!=='email') {
            echo '<p>';
            echo lang('create_user_identity_label', 'identity');
            echo '<br />';
            echo form_error('identity');
            echo form_input($identity);
            echo '</p>';
          }
          ?>

          <div class="form-group">
            <label for="exampleInputEmail1">Company Name</label>
            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Company Name" name="company">
          </div>

          <div class="form-group">
            <label for="exampleInputEmail1">Email</label>
            <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter Email" name="email">
          </div>

          <div class="form-group">
            <label for="exampleInputEmail1">Phone</label>
            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Phone No" name="phone">
          </div>

          <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
          </div>

          <div class="form-group">
            <label for="exampleInputPassword1">Confirm Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Confirm Password" name="password_confirm">
          </div>
          
        </div>
        <!-- /.box-body -->

        <div class="box-footer">
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
        <?php echo form_close();?>
      </div>
    </div>
  </div>
  <!-- /.row -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php $this->load->view('auth/footer'); ?>