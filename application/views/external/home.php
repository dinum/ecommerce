<section class="post-area section-gap">
				<div class="container">
					<div class="row justify-content-center d-flex">
						<div class="col-lg-10 post-list">
						<?php echo (isset($msg) && !empty($msg)) ? $msg : ''; ?>
						<?php if(isset($datas)&&sizeof($datas)>0){ ?>
						
							<?php foreach($datas as $data){ ?>
								<div class="single-post d-flex flex-row">
									<div class="thumb">
										<img height="150px" src="<?php echo base_url(); ?>assets/img/plate.png" alt="">
									</div>
									<div class="details">
										<div class="title d-flex flex-row justify-content-between">
											<div class="titles">
												<a href="<?php echo base_url(); ?>home/view_vacancy/<?php echo $data->id; ?>"><h4><?php echo $data->tittle; ?></h4></a>				
											</div>
											<ul class="btns pull-right">
												<?php if(array_search($data->id,$applied)){ 
													 echo "<li class='desable'>Already Applied</li>";
													  } else { ?>
												<li><a href="<?php echo base_url(); ?>home/apply/<?php echo $data->id; ?>">Apply</a></li>
												<?php } ?>
											</ul>
										</div>
										<p>
											<?php echo $data->summery; ?>
										</p>
										<h5>Job Nature: <?php echo ($data->type==1)?"Part Time":"Full time"; ?></h5>
										<p class="address"><span class="fa fa-map"></span>&nbsp;&nbsp;<?php echo $data->location; ?></p>
										<p class="address"><span class="fa fa-clock-o"></span>&nbsp;&nbsp;<?php echo $data->start; ?> - <?php echo $data->end; ?></p>
									</div>
								</div>
							<?php } ?>
						<?php } else { ?>
							<div class="alert alert-warning">No Vacancies</div>
						<?php } ?>

						</div>
						
					</div>
				</div>	
			</section>