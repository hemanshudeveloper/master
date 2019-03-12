<?php $this->load->view('auth/header'); ?>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Edit_Category
      <small>Category</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">Forms</a></li>
      <li class="active">Edit_Category</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">

    <div class="row">
      <div class="col-md-8">
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Edit_Category</h3>
          </div>
          <!-- /.box-header -->
          <!-- form start -->
          <?php echo form_open('admin/category_update');?>
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
            <?php 
            foreach($row as $r)
            {
              ?>
                <input type="hidden" name="id" value="<?php echo $r->cat_id?>">
              <div class="form-group">
                <label for="exampleInputEmail1">Catessgory Name</label>
                <input type="text" class="form-control" id="exampleInputEmail1" required="required" placeholder="Enter Category Name" name="cat_nm" value="<?php echo $r->cat_nm; ?>" >
              </div>
              <?php
            }
            ?>
            


            
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
<?php $this->load->view('auth/footer'); ?>