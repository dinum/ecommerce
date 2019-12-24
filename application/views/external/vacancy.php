<section class="post-area section-gap">
    <div class="container">
        <div class="row justify-content-center d-flex">
            <div class="col-lg-10 post-list">
                <div class="single-post d-flex flex-row">
                    <div class="thumb">
                        <img height="150px" src="<?php echo base_url(); ?>assets/img/plate.png" alt="">
                    </div>
                    <div class="details">
                        <div class="title d-flex flex-row justify-content-between">
                            <div class="titles">
                                <a href="#">
                                    <h4><?php echo $data->tittle; ?></h4>
                                </a>
                            </div>
                            <ul class="btns pull-right">
                                <?php if (array_search($data->id, $applied)) {
                                    echo "<li class='desable'>Already Applied</li>";
                                } else { ?>
                                    <li><a href="<?php echo base_url(); ?>home/apply/<?php echo $data->id; ?>">Apply</a></li>
                                <?php } ?>
                            </ul>
                        </div>
                        <p>
                            <?php echo $data->summery; ?>
                        </p>
                        <h5>Job Nature: <?php echo ($data->type == 1) ? "Part Time" : "Full time"; ?></h5>
                        <p class="address"><span class="fa fa-map"></span>&nbsp;&nbsp;<?php echo $data->location; ?></p>
                        <p class="address"><span class="fa fa-clock-o"></span>&nbsp;&nbsp;<?php echo $data->start; ?> - <?php echo $data->end; ?></p>
                        <h5>Payment Type: <?php echo ($data->pay_type == 1) ? "Hourly" : ($data->pay_type == 2) ? "Daily" : ($data->pay_type == 3) ? "Weekly" : ($data->pay_type == 4) ? "Monthly" : "Yearly"; ?></h5>
                        <p class="address"><span class="lnr lnr-database"></span>&nbsp;&nbsp;Rs.<?php echo $data->payment; ?></p>
                        <h5>Posted Date: <?php echo $data->added_date; ?></h5>
                        <p>Status : <?php

                                    if (isset($registeddata->status) && $registeddata->status == 1) {
                                        echo "<span class='text-success'>Approved</span>";
                                    } else if (isset($registeddata->status) && $registeddata->status == 0) {
                                        echo "<span class='text-info'>Pending</span>";
                                    } else {
                                        echo "<span class='text-danger'>Rejected</span>";
                                    }

                                    ?></p>
                    </div>
                </div>
                <div class="single-post job-details">
                    <h4 class="single-title">Description</h4>
                    <p>
                        <?php echo $data->description; ?>
                    </p>
                </div>
                <div class="single-post job-details">
                    <h4 class="single-title">Applied Employees</h4>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($employees as $employ) { ?>
                                <tr>
                                    <th scope="row">1</th>
                                    <td><a target="_blank" href="<?php echo base_url(); ?>staff/view/<?php echo $employ->id; ?>"><?php echo $employ->fname . " " . $employ->mname . " " . $employ->lname; ?></a></td>
                                    <td>
                                        <?php

                                        if ($employ->vacStatus == 1) {
                                            echo "<span class='text-success'>Approved</span>";
                                        } else if ($employ->vacStatus == 0) {
                                            echo "<span class='text-info'>Pending</span>";
                                        } else {
                                            echo "<span class='text-danger'>Rejected</span>";
                                        }

                                        ?>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>