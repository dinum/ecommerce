<section class="post-area section-gap">
    <div class="card card-outline-secondary width50">
    <?php echo (isset($msg)&&!empty($msg))?$msg:'';  ?>
        <div class="card-header">
            <h4 class="pull-left">Staff Members</h4>
        </div>  
        <div class="card-body">
        <?php if(isset($datas)&&sizeof($datas)>0){ ?>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">email</th>
                <th scope="col">Mobile</th>
                <th scope="col">Status</th>
                <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($datas as $key => $data){ ?>
                <tr>
                <th scope="row"><?php echo $key+1; ?></th>
                <td><a target="_blank" href="<?php echo base_url(); ?>staff/view/<?php echo $data->id; ?>"><?php echo $data->fname." ".$data->mname." ".$data->lname; ?></a></td>
                <td><?php echo $data->email; ?></td>
                <td><?php echo $data->mobile; ?></td>
                <td><?php echo ($data->status==0)?"Inactive":($data->status==1)?"Active":"Pending"; ?></td>
                <td>
                    <a href="<?php echo base_url(); ?>staff/approve/<?php echo $data->id; ?>" class="btn btn-success btn-sm small" >Approve</a>
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