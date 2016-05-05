<!-- NAVBAR CODE END -->
<div class="container">
    <?php if($this->session->flashdata('message')){ ?>
    <div class="row">
        <div class="col-md-12 alert alert-success">
            <?php echo $this->session->flashdata('message') ?>
        </div>
    </div>
    <?php } ?>
    <div class="row">
        <div class="signup-wrapper">
            <div class="col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3">
                <?php echo form_open('Dashboard/process_login') ?>
                
                <h5>Login with <strong>Your Account  :</strong></h5>
                <label>Name </label>
                <input type="text" name="name" class="form-control">
                <label>Account Type:</label>
                <select class="form-control" name="type">
                    <option value="">Select account type</option>
                    <option value="counsellors">Counsellor</option>
                    <option value="administration">Administrator</option>
                </select>
                <label> Password  </label>
                <input type="password" name="password"  class="form-control">
                <label><input type="checkbox" name="remeber" id="remeberme" value="true">Remember Me</label>
                <hr>
                <!--<a href="#" class="btn btn-info"><span class="fa fa-user"></span>&nbsp;Log In </a>--> 
                <input type="submit" name="login" id="login" class="btn btn-info" value="Login" />
                &nbsp;&nbsp; <a href="<?php echo base_url("/index.php/public/Member/forgot_password") ?>" >forgotten Password</a>
                <?php echo form_close() ?>
            </div>
        </div>
    </div>
    <!-- END SIGN UP FORM-->
</div>

</div>