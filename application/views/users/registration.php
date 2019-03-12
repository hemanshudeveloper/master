<?php $this->load->view('shopper/include/header'); ?>
<section id="form"><!--form-->
    <div class="container">
        <div class="row">
            <div class="">
                <div class="signup-form">
                    <h2>User Registration</h2>
                    <?php echo form_open("users/registration"); ?>
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
                        <input type="password" class="form-control" name="password" placeholder="Password" required="">
                        <?php echo form_error('password', '<span style="color:red;" class="help-block">', '</span>'); ?>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" name="conf_password" placeholder="Confirm password" required="">
                        <?php echo form_error('conf_password', '<span style="color:red;" class="help-block">', '</span>'); ?>
                    </div>
                    <div class="form-group">
                        <!--<button type="submit" class="btn btn-default">Signup</button>-->
                        <input style="background: #FE980F;border: medium none;border-radius: 0;color: #FFFFFF;
                               display: block;font-family: 'Roboto', sans-serif;padding: 6px 25px;" type="submit" name="regisSubmit" class="" value="Signup"/>
                    </div>
                    <?php echo form_close(); ?>
                    <p class="footInfo">Already have an account? <a href="<?php echo base_url(); ?>users/login">Login here</a></p>              
                </div>
            </div>
        </div>
    </div>
</section>
</body>
</html>