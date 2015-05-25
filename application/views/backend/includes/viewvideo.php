<div class=" row" style="padding:1% 0;">
	<div class="col-md-12">
	
		<a class="btn btn-primary pull-right"  href="<?php echo site_url('site/createvideo'); ?>"><i class="icon-plus"></i>Create </a> &nbsp; 
	</div>
	
</div>
<div class="row">
	<div class="col-lg-12">
		<section class="panel">
			<header class="panel-heading">
                Video Details
            </header>
			<table class="table table-striped table-hover" cellpadding="0" cellspacing="0" width="100%">
			<thead>
				<tr>
					<th>Id</th>
					<th>Title</th>
					<th>Description</th>
					<td>User</td>
					<td>Latitude</td>
					<td>Longitude</td>
					<td>URL</td>
<!--					<td><i class=" icon-edit"></i>Status</td>-->
					<th> Actions </th>
				</tr>
			</thead>
			<tbody>
			   <?php foreach($table as $row) { ?>
					<tr>
						<td><?php echo $row->id;?></td>
						<td><?php echo $row->title;?></td>
						<td><?php echo $row->description;?></td>
						<td><?php echo $row->firstname.' '.$row->lastname;?></td>
						<td><?php echo $row->lat;?></td>
						<td><?php echo $row->long;?></td>
						<td><?php echo $row->videourl;?></td>
<!--
						<td><?php if($row->status==1) { ?>
							<a href="<?php echo site_url('site/changevideostatus?id=').$row->id; ?>" class="label label-success label-mini">Enable</a>
						<?php } else { ?>
							<a href="<?php echo site_url('site/changevideostatus?id=').$row->id; ?>" class="label label-danger label-mini">Disable</a>
						<?php } ?>
						</td>
-->
						<td>
							<a href="<?php echo site_url('site/editvideo?id=').$row->id;?>" class="btn btn-primary btn-xs">
								<i class="icon-pencil"></i>
							</a>
							<a href="<?php echo site_url('site/deletevideo?id=').$row->id; ?>" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure?')">
								<i class="icon-trash "></i>
							</a> 
						
						</td>
					</tr>
					<?php } ?>
			</tbody>
			</table><br>
			<div class="clear pagination">
                <ul>
                    <?php echo $this->pagination->create_links(); ?>
                </ul>    
            </div>
		</section>
	</div>
</div>