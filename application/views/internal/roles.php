<section class="post-area section-gap">
<div class="card card-outline-secondary width50">
    <div class="card-header">
        <h4 class="pull-left">User Roles</h4><a href="<?php echo base_url(); ?>roles/add" class="btn btn-info btn-small pull-right" ><i class="fa fa-plus"></i>&nbsp;Add User Role</a>
    </div>      
    <div class="card-body">
        <?php echo (isset($msg)&&!empty($msg))?$msg:'';  ?>
        <ul class="list-group list-group-flush">
            <?php foreach ($datas as $data){ ?>
            <li class="list-group-item"><?php echo $data->name; ?></li>
            <?php } ?>
        </ul>
    </div>
</div>
</section>