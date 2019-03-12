<?php $this->load->view('auth/header'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Product
      <small>Add</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">Forms</a></li>
      <li class="active">Product_Add</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">

    <div class="row">
     <div class="col-md-8">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Product_Add</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <?php echo form_open_multipart("admin/product_add");?>
        <div class="box-body">
          
          <span style="color: red;"><?php echo validation_errors(); ?></span>
          <div class="form-group">
            <label for="exampleInputEmail1">Product Name</label>
            
            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Product Name" name="p_nm">
          </div>

          <div class="form-group">
            <label for="exampleInputEmail1">Product Price</label>
            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Product Price" name="p_price">
          </div>

          <div class="form-group">
            <label for="exampleInputEmail1">Product Image</label>
            <input type="file" class="form-control" id="exampleInputEmail1" placeholder="Enter Product Image" name="p_img">
          </div>

          <div class="form-group">
            <label for="exampleInputEmail1">Category</label>
            <select name="p_cat" class="form-control">
              <option value="">Select Category</option>
              <?php
                foreach($categorys as $category)
                {
                  ?>
                    <option value="<?php echo $category->cat_id; ?>"><?php echo $category->cat_nm; ?></option>
                  <?php
                }
              ?>
              
            </select>
           
          </div>

          <div class="form-group">
            <label for="exampleInputPassword1">Product Description</label>
            <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Enter Product Description" name="p_desc">
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