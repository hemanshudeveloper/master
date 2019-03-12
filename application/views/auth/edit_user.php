<?php $this->load->view('auth/header'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Edit_User
      <small>User</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">Forms</a></li>
      <li class="active">Edit_User</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">

    <div class="row">
     <div class="col-md-8">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Edit_User</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <?php echo form_open(uri_string());?>
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
            <input type="text" class="form-control" name="first_name" id="exampleInputEmail1" placeholder="Enter First Name" value="<?php echo $user->first_name; ?>">
          </div>

          <div class="form-group">
            <label for="exampleInputEmail1">Last Name</label>
            <input type="text" class="form-control" name="last_name" id="exampleInputEmail1" placeholder="Enter Last Name" value="<?php echo $user->last_name; ?>">
          </div>

          <div class="form-group">
            <label for="exampleInputEmail1">Company Name</label>
            <input type="text" class="form-control" name="company" id="exampleInputEmail1" placeholder="Enter Company Name" value="<?php echo $user->company; ?>">
          </div>


          <div class="form-group">
            <label for="exampleInputEmail1">Phone</label>
            <input type="text" class="form-control" name="phone" id="exampleInputEmail1" placeholder="Enter Phone No" value="<?php echo $user->phone; ?>">
          </div>

          <div class="form-group">
            <label for="exampleInputPassword1">Password (IF CHANGING PASSWORD)</label>
            <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Password">
          </div>

          <div class="form-group">
            <label for="exampleInputPassword1">Confirm Password (IF CHANGING PASSWORD)</label>
            <input type="password" class="form-control" name="password_confirm" id="exampleInputPassword1" placeholder="Confirm Password">
          </div>

          <?php if ($this->ion_auth->is_admin()): ?>
            <div class="form-group">
             <span class="form-label">Member of groups</span><br/>
             
             <?php foreach ($groups as $group):?>
              <label class="checkbox-inline" style="color: #000;">
                <?php
                $gID=$group['id'];
                $checked = null;
                $item = null;
                foreach($currentGroups as $grp) {
                  if ($gID == $grp->id) {
                    $checked= ' checked="checked"';
                    break;
                  }
                }
                ?>
                <input type="checkbox" name="groups[]" value="<?php echo $group['id'];?>"<?php echo $checked;?>>
                <?php echo htmlspecialchars($group['name'],ENT_QUOTES,'UTF-8');?>
              </label>
            <?php endforeach?>
          </div>
        <?php endif ?>

        <?php echo form_hidden('id', $user->id);?>
        <?php echo form_hidden($csrf); ?>
        
        
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