<?php $this->load->view('auth/header'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Dashboard
      <small>Version 2.0</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Dashboard</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <!-- Info boxes -->
    <div class="row">
      <div class="clearfix visible-sm-block"></div>

      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon bg-green"><i class="ion ion-ios-cart-outline"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">User</span>
            <span class="info-box-number"><?php echo $tot_user;?></span>
          </div>
          
        </div>
        
      </div>
      
      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Group</span>
            <span class="info-box-number"><?php echo $tot_group;?></span>
          </div>
          
        </div>
        
      </div>
      
    </div>

    <div class="row">
      <?php 
      if(isset($message))
      {
        ?>
        <div class="alert alert-success alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <h4><i class="icon fa fa-check"></i> Success</h4>
          <?php echo $message;?>
        </div>
        <?php
      }
      ?>
      
      


      <div class="col-md-8">
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title">User Table</h3>
          </div>
          
          <div class="box-body">
            <table class="table table-bordered">
              <tbody>
                <tr>
                  <th>No</th>
                  <th>First Name</th>
                  <th>Last Name</th>
                  <th>Email</th>
                  <th>Groups</th>
                  <th>Status</th>
                </tr>
                <?php foreach ($users as $user):?>
                  <tr>
                    <td><?php echo htmlspecialchars($user->id,ENT_QUOTES,'UTF-8');?></td>
                    <td><?php echo htmlspecialchars($user->first_name,ENT_QUOTES,'UTF-8');?></td>
                    <td><?php echo htmlspecialchars($user->last_name,ENT_QUOTES,'UTF-8');?></td>
                    <td><?php echo htmlspecialchars($user->email,ENT_QUOTES,'UTF-8');?></td>

                    <td><?php foreach ($user->groups as $group):?>
                    <h4><?php echo $group->name; ?></h4><br/>
                    <?php endforeach?></td>
                    <td><?php echo ($user->active) ? lang('index_active_link') : lang('index_inactive_link');?></td>
                    
                  </tr>
                <?php endforeach;?>

              </tbody></table>
            </div>
            
          </div>
          
        </div>

        <div class="col-md-4">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Group Table</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered">
                <tbody>
                  <tr>
                    <th>No</th>
                    <th>Group Name</th>
                    <th>Description</th>
                  </tr>
                  <?php foreach ($groups as $group):?>
                    <tr>
                      <td><?php echo htmlspecialchars($group->id,ENT_QUOTES,'UTF-8');?></td>
                      <td><?php echo htmlspecialchars($group->name,ENT_QUOTES,'UTF-8');?></td>
                      <td><?php echo htmlspecialchars($group->description,ENT_QUOTES,'UTF-8');?></td>
                    </tr>
                  <?php endforeach;?>

                </tbody></table>
              </div>
            </div>
          </div>
        </div>

        <div class="box-footer clearfix">
          <a href="<?php echo base_url()."auth/create_user"; ?>" class="btn btn-sm btn-info">Create_User</a>
          <a href="<?php echo base_url()."auth/create_group"; ?>" class="btn btn-sm btn-info">Create_Group</a>
        </div>
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <?php $this->load->view('auth/footer'); ?>