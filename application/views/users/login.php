<?php $this->load->view('shopper/include/header'); ?>
<section id="form"><!--form-->
    <div class="container">
        <div class="row">
            <div class="">
                <div class="login-form">
                    <h2>User Login</h2>
                    <?php
                    if (!empty($success_msg)) {
                        echo '<p style="color:green;" class="statusMsg">' . $success_msg . '</p>';
                    } elseif (!empty($error_msg)) {
                        echo '<p style="color:red;" class="statusMsg">' . $error_msg . '</p>';
                    }
                    ?>
                    <?php echo form_open("users/login");?>
                        <div class="form-group has-feedback">
                            <input type="email" class="form-control" name="email" placeholder="Email" required="" value="">
                            <?php echo form_error('email', '<span style="color:red;" class="help-block">', '</span>'); ?>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="password" placeholder="Password" required="">
                            <?php echo form_error('password', '<span style="color:red;" class="help-block">', '</span>'); ?>
                        </div>
                        <div class="form-group">
                            <!--<button type="submit" class="btn btn-default">Login</button>-->
                            <input style="background: #FE980F;border: medium none;border-radius: 0;color: #FFFFFF;
                               display: block;font-family: 'Roboto', sans-serif;padding: 6px 25px;" type="submit" name="loginSubmit" class="btn btn-default" value="Login"/>
                        </div>
                    </form>
                    <p class="footInfo">Don't have an account? <a href="<?php echo base_url(); ?>users/registration">Register here</a></p>
                </div>
            </div>
        </div>
    </div>
</section>
<?php $this->load->view('shopper/include/footer'); ?>