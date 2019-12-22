<section class="contact-page-area section-gap">
<div class="loginform section-top-border">
        <div class="row">            
            <div class="col-lg-12">
                <h3 class="mb-30">Contact us for more Information</h3>
                <?php echo (isset($msg)&&$msg!="")?$msg:""; ?>
                <form class="form-area" action="<?php echo base_url(); ?>contact" method="post" class="contact-form text-right">
                    <div class="row">	
                        <div class="col-lg-12 form-group">
                            <input name="name" placeholder="Enter your name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your name'" class="common-input mb-20 form-control" required="" type="text">

                            <input name="email" placeholder="Enter email address" pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email address'" class="common-input mb-20 form-control" required="" type="email">

                            <input name="subject" placeholder="Enter your subject" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your subject'" class="common-input mb-20 form-control" required="" type="text">
                            <textarea class="common-textarea mt-10 form-control" name="message" placeholder="Messege" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Messege'" required=""></textarea>
                            <button type="submit" name="sendmailb" class="primary-btn mt-20 text-white" style="float: right;">Send Message</button>
                            <div class="mt-20 alert-msg" style="text-align: left;"></div>
                        </div>
                    </div>
                </form>	
            </div>
        </div>
    </div>	
</section>