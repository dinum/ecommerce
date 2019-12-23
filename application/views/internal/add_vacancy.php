<section class="post-area section-gap">
    <div class="card card-outline-secondary width50">
        <?php echo (isset($msg) && !empty($msg)) ? $msg : ''; ?>
        <div class="card-header">
            <h4 class="pull-left">Add Vacancy</h4>
        </div>  
        <div class="card-body">
            <form action="<?php echo base_url(); ?>vacancies/add" method="POST" style="width: 100%;">
                <div class="mt-10">
                    <input type="text" name="title" value="<?php echo (isset($data['tittle'])) ? $data['tittle'] : ""; ?>" placeholder="Title" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Title'" required class="single-input">
                    <?php echo (isset($error['title']) && !empty($error['title'])) ? $error['title'] : ''; ?>
                </div>
                <div class="mt-10">
                    <textarea name="summery"  class="single-textarea" placeholder="Summery" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Summery'" required><?php echo (isset($data['summery'])) ? $data['summery'] : ""; ?></textarea>
                    <?php echo (isset($error['summery']) && !empty($error['summery'])) ? $error['summery'] : ''; ?>
                </div>
                <div class="input-group-icon mt-10">
                    <div class="icon"><i class="fa fa-adjust" aria-hidden="true"></i></div>
                    <div class="form-select" id="default-select">
                        <select name="type">
                            <option <?php echo (isset($data['type']) && $data['type'] == 1) ? "selected" : ""; ?> value="1">Part Time</option>
                            <option <?php echo (isset($data['type']) && $data['type'] == 2) ? "selected" : ""; ?> value="2">Full Time</option>
                        </select>
                        <?php echo (isset($error['type']) && !empty($error['type'])) ? $error['type'] : ''; ?>
                    </div>
                </div>
                <div class="input-group-icon mt-10">
                    <div class="icon"><i class="fa fa-clock-o" aria-hidden="true"></i></div>
                    <input value="<?php echo (isset($data['start'])) ? $data['start'] : ""; ?>" type="text" name="sdate" id="datetimepicker1" data-toggle="datetimepicker" data-target="#datetimepicker1"  placeholder="Start Date/Time" required class="single-input"/>
                    <?php echo (isset($error['sdate']) && !empty($error['sdate'])) ? $error['sdate'] : ''; ?>
                </div>
                <div class="input-group-icon mt-10">  
                    <div class="icon"><i class="fa fa-clock-o" aria-hidden="true"></i></div>
                    <input value="<?php echo (isset($data['end'])) ? $data['end'] : ""; ?>" type="text" name="edate" id="datetimepicker2" data-toggle="datetimepicker" data-target="#datetimepicker2"  placeholder="End Date/Time" required class="single-input"/>
                    <?php echo (isset($error['edate']) && !empty($error['edate'])) ? $error['edate'] : ''; ?>
                </div>
                <div class="input-group-icon mt-10">
                    <div class="icon"><i class="fa fa-thumb-tack" aria-hidden="true"></i></div>
                    <input type="text" value="<?php echo (isset($data['location'])) ? $data['location'] : ""; ?>" name="address" placeholder="Location" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Location'" required class="single-input">
                    <?php echo (isset($error['address']) && !empty($error['address'])) ? $error['address'] : ''; ?>
                </div>
                <div class="input-group-icon mt-10">
                    <div class="icon"><i class="fa fa-exchange" aria-hidden="true"></i></div>
                    <div class="form-select" id="default-select">
                        <select name="moneytype">
                            <option value="0">Please Select Payment Type</option>
                            <option <?php echo (isset($data['pay_type']) && $data['pay_type'] == 1) ? "selected" : ""; ?> value="1">Hourly</option>
                            <option <?php echo (isset($data['pay_type']) && $data['pay_type'] == 2) ? "selected" : ""; ?> value="2">Daily</option>
                            <option <?php echo (isset($data['pay_type']) && $data['pay_type'] == 3) ? "selected" : ""; ?> value="2">Weekly</option>
                            <option <?php echo (isset($data['pay_type']) && $data['pay_type'] == 4) ? "selected" : ""; ?> value="2">Monthly</option>
                            <option <?php echo (isset($data['pay_type']) && $data['pay_type'] == 5) ? "selected" : ""; ?> value="2">Yearly</option>
                        </select>
                        <?php echo (isset($error['moneytype']) && !empty($error['moneytype'])) ? $error['moneytype'] : ''; ?>
                    </div>
                </div>
                <div class="input-group-icon mt-10">
                    <div class="icon"><i class="fa fa-money" aria-hidden="true"></i></div>
                    <input type="text" value="<?php echo (isset($data['payment'])) ? $data['payment'] : ""; ?>" name="money" placeholder="Amount" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Amount'" required class="single-input">
                    <?php echo (isset($error['money']) && !empty($error['money'])) ? $error['money'] : ''; ?>
                </div>
                <div class="mt-10">
                    <textarea name="description"  class="single-textarea" placeholder="Description" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Description'" required><?php echo (isset($data['description'])) ? $data['description'] : ""; ?></textarea>
                    <?php echo (isset($error['description']) && !empty($error['description'])) ? $error['description'] : ''; ?>
                </div>
                <br/>
                <div class="mt-10"> 
                    <input type="submit" name="submitdata" value="Save" class="btn btn-primary" />
                </div>    
            </form>
        </div>
    </div>
</section> 
