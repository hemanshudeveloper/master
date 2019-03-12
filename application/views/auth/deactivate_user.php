<?php $this->load->view('auth/header'); ?>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Deactivate
      <small>User</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">Forms</a></li>
      <li class="active">Deactivate_User</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">

    <div class="row">
      <div class="col-md-8">
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Deactivate_User</h3>
          </div>
          <!-- /.box-header -->
          <!-- form start -->
          <?php echo form_open("auth/deactivate/".$user->id);?>
          <div class="box-body">
            <div class="form-group">
              <label>Are you sure you want to deactivate the user <?php echo $user->username;?></label>
            </div>

            <div class="form-group">
              <label for="exampleInputEmail1">Yes</label>
              <input type="radio" name="confirm" value="yes" checked="checked" />&nbsp;&nbsp;&nbsp;
              <label for="exampleInputEmail1">No</label>
              <input type="radio" name="confirm" value="no" />
            </div>
            <?php echo form_hidden($csrf); ?>
            <?php echo form_hidden(['id' => $user->id]); ?>
          </div>
          <!-- /.box-body -->

          <div class="box-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
          <?php echo form_close(); ?>
        </div>
      </div>
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<?php $this->load->view('auth/footer'); ?>