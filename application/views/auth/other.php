  <div class="box box-info">
        <div class="box-header with-border">
          <h3 class="box-title">User</h3>
          
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box">
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
          <?php 
            if(isset($messaged))
            {
              ?>
               <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Success</h4>
                <?php echo $messaged;?>
               </div>
              <?php
            }
          ?>
         
          <div class="box-header">
            <h3 class="box-title">Hover Data Table</h3>
          </div>
          <div class="box-body">
            <table id="example2" class="table table-responsive table-hover">
              <thead>
                <tr>
                  <th>First Name</th>
                  <th>Last Name</th>
                  <th>Email</th>
                  <th>Groups</th>
                  <th>Status</th>
                  
                </tr>
              </thead>
              <tbody>
                <?php foreach ($users as $user):?>
                  <tr>
                    <td><?php echo htmlspecialchars($user->first_name,ENT_QUOTES,'UTF-8');?></td>
                    <td><?php echo htmlspecialchars($user->last_name,ENT_QUOTES,'UTF-8');?></td>
                    <td><?php echo htmlspecialchars($user->email,ENT_QUOTES,'UTF-8');?></td>

                    <td><?php foreach ($user->groups as $group):?>
              <?php echo anchor("auth/edit_group/".$group->id, htmlspecialchars($group->name,ENT_QUOTES,'UTF-8'),"class='btn btn-primary'") ;?><br /><br/>
                    <?php endforeach?></td>
                    <td><?php echo ($user->active) ? anchor("auth/deactivate/".$user->id, lang('index_active_link'),"class='btn btn-primary'") : anchor("auth/activate/". $user->id, lang('index_inactive_link'),"class='btn btn-danger'");?></td>
                    
                 </tr>
               <?php endforeach;?>
              
            </tbody>
            <tfoot>
              <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Groups</th>
                <th>Status</th>
              </tr>
            </tfoot>
          </table>
        </div>
      </div>