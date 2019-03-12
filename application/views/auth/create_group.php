<?php $this->load->view('auth/header'); ?>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Create_Group
      <small>Group</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">Forms</a></li>
      <li class="active">Create_Group</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">

    <div class="row">
      <div class="col-md-8">
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Create_Group</h3>
          </div>
          <!-- /.box-header -->
          <!-- form start -->
          <?php echo form_open("auth/create_group");?>
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
              <label for="exampleInputEmail1">Group Name</label>
              <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Group Name" name="group_name">
            </div>

            <div class="form-group">
              <label for="exampleInputEmail1">Group Description</label>
              <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Group Description" name="description">
            </div>

            
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