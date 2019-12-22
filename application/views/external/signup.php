<section class="post-area section-gap">
    <div class="card width50">
        <h3 class="mb-30">Connect with Us - Create Free Account</h3>
        <div class="section-top-border">
            <div class="row">
                <div class="col-lg-8 col-md-8">
                    <?php echo (isset($msg)&&$msg!="")?$msg:""; ?>
                    <form action="<?php echo base_url(); ?>signup" method="POST" >
                        <h5 class="mb-30">Basic Information</h5>
                        <div class="mt-10">
                            <input type="text" name="first_name" value="<?php echo (isset($data['fname'])) ? $data['fname'] : ""; ?>" placeholder="First Name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'First Name'" required class="single-input">
                            <?php echo (isset($error['fname']) && !empty($error['fname'])) ? $error['fname'] : ''; ?>
                        </div>
                        <div class="mt-10">
                            <input type="text" name="middle_name" value="<?php echo (isset($data['mname'])) ? $data['mname'] : ""; ?>" placeholder="Middle Name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Middle Name'" required class="single-input">
                            <?php echo (isset($error['mname']) && !empty($error['mname'])) ? $error['mname'] : ''; ?>
                        </div>
                        <div class="mt-10">
                            <input type="text" name="last_name" value="<?php echo (isset($data['lname'])) ? $data['lname'] : ""; ?>" placeholder="Last Name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Last Name'" required class="single-input">
                            <?php echo (isset($error['lname']) && !empty($error['lname'])) ? $error['lname'] : ''; ?>
                        </div>
                        <div class="mt-10">
                            <input name="email" value="<?php echo (isset($data['email'])) ? $data['email'] : ""; ?>" placeholder="Enter email address" pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email address'" class="single-input" required type="email">
                            <?php echo (isset($error['email']) && !empty($error['email'])) ? $error['email'] : ''; ?>
                        </div>
                        <div class="mt-10">
                            <input name="mobile" value="<?php echo (isset($data['mobile'])) ? $data['mobile'] : ""; ?>" placeholder="Enter Mobile Number" pattern="[0-9]{10}$" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Mobile Number'" class="single-input" required type="text">
                            <?php echo (isset($error['mobile']) && !empty($error['mobile'])) ? $error['mobile'] : ''; ?>
                        </div>
                        <div class="input-group-icon mt-10">
                            <div class="icon"><i class="fa fa-thumb-tack" aria-hidden="true"></i></div>
                            <input type="text" value="<?php echo (isset($data['address'])) ? $data['address'] : ""; ?>" name="address" placeholder="Address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Address'" required class="single-input">
                        </div>
                        
                        <hr/>
                        <br/>
                        <h5 class="mb-30">Qualification</h5>
                        <div class="mt-10">
                            <textarea name="qualification" class="single-textarea" placeholder="Qualification / Skills" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Message'" required><?php echo (isset($data['qualification'])) ? $data['qualification'] : ""; ?></textarea>
                        </div>
                        <hr/>
                        <br/>
                        <h5 class="mb-30">User Credential Details</h5>
                        <div class="mt-10">
                            <input type="text" name="uname" placeholder="User Name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'User Name'" required class="single-input">
                            <?php echo (isset($error['uname']) && !empty($error['uname'])) ? $error['uname'] : ''; ?>
                        </div>
                        <div class="mt-10">
                            <input type="password" name="password" placeholder="Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password'" required class="single-input">
                            <?php echo (isset($error['pw']) && !empty($error['pw'])) ? $error['pw'] : ''; ?>
                            <div class="alert alert-warning validator" role="alert">
                                Password Should Contain, 
                                a minimum of 1 lower case letter [a-z] and
                                a minimum of 1 upper case letter [A-Z] and
                                a minimum of 1 numeric character [0-9] and
                                Passwords must be at least 8 characters in length.
                            </div>
                        </div>
                        <div class="mt-10">
                            <input type="password" name="cpassword" placeholder="Confirm Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Confirm Password'" required class="single-input">
                            <?php echo (isset($error['rpw']) && !empty($error['rpw'])) ? $error['rpw'] : ''; ?>
                        </div>
                        <hr/>
                        <br/>
                        
                        <input type="submit" name="submitdata" value="Signup" class="btn btn-primary" />
                    </form>
                </div>
                <div class="col-lg-4 col-md-4 mt-sm-30">
                    <h5>TERMS OF EMPLOYMENT</h5>
                    <br/>
                    <div class="alert alert-warning">
                        
                        <p> 1. Position and Duties. Athula Caterers shall employ you, and you agree to competently and professionally perform such duties as are customarily the responsibility of the position as set forth in the job description attached as EXHIBIT A, and as reasonably assigned to you from time to time by your Manager as set forth in EXHIBIT A.
                        </p> 
                        <p> 
    2. Outside Business Activities. During your employment with Athula Caterers, you shall devote competent energies, interests, and abilities to the performance of your duties under this Agreement. During the term of this Agreement, you shall not, without Athula Caterers’s prior written consent, render any services to others for compensation or engage or participate, actively or passively, in any other business activities that would interfere with the performance of your duties hereunder or compete with Athula Caterers’s business.
                        </p>
                        <p>
3. Employment Classification. You shall be a Part-Time Employee, and shall not be entitled to benefits except as specifically outlined herein.
                        </p>
                        
                    </div>
                    
                    
                </div>
            </div>
        </div>
    </div>
</section>