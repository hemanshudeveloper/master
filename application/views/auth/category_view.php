<?php $this->load->view('auth/header'); ?>
<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Data Tables
      <small>advanced tables</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">Tables</a></li>
      <li class="active">Data tables</li>
    </ol>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Hover Data Table</h3>
          </div>
          <?php
          if($this->session->flashdata('cat_su'))
          {
            ?>
            <div class="alert alert-success alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
              <h4><i class="icon fa fa-check"></i> Success</h4>
              <?php echo $this->session->flashdata('cat_su')?>
            </div>
            <?php
          }
          ?>
          <?php
          if($this->session->flashdata('cat_up'))
          {
            ?>
            <div class="alert alert-success alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
              <h4><i class="icon fa fa-check"></i> Success</h4>
              <?php echo $this->session->flashdata('cat_up')?>
            </div>
            <?php
          }
          ?>
          <?php
          if($this->session->flashdata('cat_del'))
          {
            ?>
            <div class="alert alert-success alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
              <h4><i class="icon fa fa-check"></i> Success</h4>
              <?php echo $this->session->flashdata('cat_del')?>
            </div>
            <?php
          }
          ?>
          <div class="box-body">
            <table id="example2" class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Category Name</th>
                  <th colspan="2">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($categorys as $category):?>
                  <tr>
                    <td><?php echo htmlspecialchars($category->cat_id,ENT_QUOTES,'UTF-8');?></td>
                    <td><?php echo htmlspecialchars($category->cat_nm,ENT_QUOTES,'UTF-8');?></td>
                    <td>
                     <a href="<?php echo base_url().'admin/category_edit/'.$category->cat_id;?>" class="btn btn-primary">Edit</a>&nbsp;
                     <a onclick="return confirm('Delete this record?')" href="<?php echo base_url().'admin/category_delete/'.$category->cat_id;?>" class="btn btn-danger">Delete</a>
                   </td>
                 </tr>
               <?php endforeach;?>
               
             </tbody>
             <tfoot>
              <tr>
                <th>No</th>
                <th>Category Name</th>
                <th colspan="2">Action</th>
              </tr>
            </tfoot>
          </table>
        </div>
      </div>
    </div>
  </div>
</section>
</div>
<?php $this->load->view('auth/footer'); ?>
<script>
  $(function () {
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
  $('a.delete').on('click', function() {
    var choice = confirm('Do you really want to delete this record?');
    if(choice === true) {
        return true;
    }
    return false;
});
</script>
