<section class="post-area section-gap">
    <div class="card card-outline-secondary width50">
    <?php echo (isset($msg)&&!empty($msg))?$msg:'';  ?>
        <div class="card-header">
            <h4 class="pull-left">Vacancy Request</h4>
        </div>  
        <div class="card-body">
        <?php if(isset($datas)&&sizeof($datas)>0){ ?>

        

        <table class="table">
            <thead class="thead-dark">
                <tr>
                <th scope="col">#</th>
                <th scope="col">Vacancy</th>
                <th scope="col">Applicant</th>
                <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($datas as $key => $data){ ?>
                <tr>
                <th scope="row"><?php echo $key+1; ?></th>
                <td><a target="_blank" href="<?php echo base_url(); ?>home/view_vacancy/<?php echo $data->vacancyid; ?>"><?php echo $data->tittle; ?></a></td>
                <td><a target="_blank" href="<?php echo base_url(); ?>staff/view/<?php echo $data->userid; ?>"><?php echo $data->fname." ".$data->mname." ".$data->lname; ?></a></td>
                <td>
                    <a class="btn btn-success btn-sm" href="<?php echo base_url(); ?>vacancies/approve/<?php echo $data->id; ?>" >
                        Approve
                    </a>
                    &nbsp;
                    <a class="btn btn-danger btn-sm" href="<?php echo base_url(); ?>vacancies/reject/<?php echo $data->id; ?>" >
                        Reject
                    </a>
                </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
        <?php } else {
            echo "<div class='alert alert-warning'>No Records</div>";
        } ?>
        </div>
    </div>
</section>    