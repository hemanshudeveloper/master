<?php $this->load->view('auth/header'); ?>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Category
      <small>Add</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">Forms</a></li>
      <li class="active">Category_Add</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">

    <div class="row">
      <div class="col-md-8">
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Category_Add</h3>
          </div>
          <!-- /.box-header -->
          <!-- form start -->
          <?php echo form_open("admin/category_add");?>
          <div class="box-body">
            <span style="color: red;"><?php echo validation_errors(); ?></span>
            <div class="form-group">
              <label for="exampleInputEmail1">Category Name</label>
              <input type="text" class="form-control" id="cat_nm" placeholder="Enter Category Name" name="cat_nm">
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