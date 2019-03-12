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
          <div class="box-body">
            <table id="example2" class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>Group Name</th>
                  <th>Description</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($groups as $group):?>
                  <tr>
                    <td><?php echo htmlspecialchars($group->name,ENT_QUOTES,'UTF-8');?></td>
                    <td><?php echo htmlspecialchars($group->description,ENT_QUOTES,'UTF-8');?></td>
                    <td>
                     <a href="<?php echo base_url().'auth/edit_group/'.$group->id;?>" class="btn btn-primary">Edit</a>
                   </td>
                 </tr>
               <?php endforeach;?>
               
             </tbody>
             <tfoot>
              <tr>
                <th>Group Name</th>
                <th>Description</th>
                <th>Action</th>
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
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>