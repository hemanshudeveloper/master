<?php $this->load->view('shopper/include/header'); ?>
<section id="form"><!--form-->
    <div class="container">
        <div class="row">
            <div class="">
                <div class="signup-form">
                    <h2>User Account</h2>
                    <h3>Welcome <?php echo $user['name']; ?>!</h3>
                   
                    <?php echo form_open("users/update_user"); ?>
                    <input type="hidden" name="u_id" value="<?php echo $user['id']; ?>">
                    <div class="form-group">
                        <input type="text" class="form-control" name="name" placeholder="Name" required="" value="<?php echo!empty($user['name']) ? $user['name'] : ''; ?>">
                        <?php echo form_error('name', '<span style="color:red;" class="help-block">', '</span>'); ?>
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control" name="email" placeholder="Email" required="" value="<?php echo!empty($user['email']) ? $user['email'] : ''; ?>">
                        <?php echo form_error('email', '<span style="color:red;" class="help-block">', '</span>'); ?>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="phone" placeholder="Phone" value="<?php echo!empty($user['phone']) ? $user['phone'] : ''; ?>">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" name="password" placeholder="Password">
                        <?php echo form_error('password', '<span style="color:red;" class="help-block">', '</span>'); ?>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" name="conf_password" placeholder="Confirm password">
                        <?php echo form_error('conf_password', '<span style="color:red;" class="help-block">', '</span>'); ?>
                    </div>
                    <div class="form-group">
                        <!--<button type="submit" class="btn btn-default">Signup</button>-->
                        <input style="background: #FE980F;border: medium none;border-radius: 0;color: #FFFFFF;
                               display: block;font-family: 'Roboto', sans-serif;padding: 6px 25px;" type="submit" name="updateSubmit" class="" value="Update"/>
                    </div>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php $this->load->view('shopper/include/footer'); ?>