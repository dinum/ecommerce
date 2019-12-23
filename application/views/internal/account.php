<section class="post-area section-gap">
    <div class="card width50">
        <div class="section-top-border">
            <div class="row">

                    <?php echo (isset($msg)&&$msg!="")?$msg:""; ?>
                    <form action="<?php echo base_url(); ?>signup" method="POST" >
                        <h5 class="mb-30">Basic Information</h5>
                        <div class="mt-10">
                            <input type="text" name="first_name" value="<?php echo (isset($data->fname)) ? $data->fname : ""; ?>" placeholder="First Name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'First Name'" required class="single-input">
                            <?php echo (isset($error['fname']) && !empty($error['fname'])) ? $error['fname'] : ''; ?>
                        </div>
                        <div class="mt-10">
                            <input type="text" name="middle_name" value="<?php echo (isset($data->mname)) ? $data->mname : ""; ?>" placeholder="Middle Name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Middle Name'" required class="single-input">
                            <?php echo (isset($error['mname']) && !empty($error['mname'])) ? $error['mname'] : ''; ?>
                        </div>
                        <div class="mt-10">
                            <input type="text" name="last_name" value="<?php echo (isset($data->lname)) ? $data->lname : ""; ?>" placeholder="Last Name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Last Name'" required class="single-input">
                            <?php echo (isset($error['lname']) && !empty($error['lname'])) ? $error['lname'] : ''; ?>
                        </div>
                        <div class="mt-10">
                            <input name="email" value="<?php echo (isset($data->email)) ? $data->email : ""; ?>" placeholder="Enter email address" pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email address'" class="single-input" required type="email">
                            <?php echo (isset($error['email']) && !empty($error['email'])) ? $error['email'] : ''; ?>
                        </div>
                        <div class="mt-10">
                            <input name="mobile" value="<?php echo (isset($data->mobile)) ? $data->mobile : ""; ?>" placeholder="Enter Mobile Number" pattern="[0-9]{10}$" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Mobile Number'" class="single-input" required type="text">
                            <?php echo (isset($error['mobile']) && !empty($error['mobile'])) ? $error['mobile'] : ''; ?>
                        </div>
                        <div class="input-group-icon mt-10">
                            <div class="icon"><i class="fa fa-thumb-tack" aria-hidden="true"></i></div>
                            <input type="text" value="<?php echo (isset($data->address)) ? $data->address : ""; ?>" name="address" placeholder="Address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Address'" required class="single-input">
                        </div>
                        
                        <hr/>
                        <br/>
                        <h5 class="mb-30">Qualification</h5>
                        <div class="mt-10">
                            <textarea name="qualification" class="single-textarea" placeholder="Qualification / Skills" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Message'" required><?php echo (isset($data->qualification)) ? $data->qualification: ""; ?></textarea>
                        </div>
                        <br/>
                        
                        <input type="submit" name="submitdata" value="Signup" class="btn btn-primary" />
                    </form>

            </div>
        </div>    
    </div>
</section>