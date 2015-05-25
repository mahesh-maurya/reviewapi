<div class=" row" style="padding:1% 0;">
	<div class="col-md-12">
	
		<a class="btn btn-primary pull-right"  href="<?php echo site_url('site/createvideopart'); ?>"><i class="icon-plus"></i>Create </a> &nbsp; 
	</div>
	
</div>
<div class="row">
	<div class="col-lg-12">
		<section class="panel">
			<header class="panel-heading">
                Videopart Details
            </header>
			<table class="table table-striped table-hover " cellpadding="0" cellspacing="0" width="100%">
			<thead>
				<tr>
					<th>Id</th>
					<th>Video</th>
					<th>Part</th>
					<th>Question</th>
					<th>Videourl</th>
<!--					<th>status</th>-->
					<th> Actions </th>
				</tr>
			</thead>
			<tbody>
			   <?php foreach($table as $row) { ?>
					<tr>
						<td><?php echo $row->id;?></td>
						<td><?php echo $row->videotitle;?></td>
						<td><?php echo $row->part;?></td>
						<td><?php echo $row->question;?></td>
						<td><?php echo $row->videourl;?></td>
<!--						<td><?php echo $row->status;?></td>-->
						<td>
							<a href="<?php echo site_url('site/editvideopart?id=').$row->id;?>" class="btn btn-primary btn-xs">
								<i class="icon-pencil"></i>
							</a>
							<a href="<?php echo site_url('site/deletevideopart?id=').$row->id; ?>" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure?')">
								<i class="icon-trash "></i>
							</a> 
						
						</td>
					</tr>
					<?php } ?>
			</tbody>
			</table>
<?php echo $this->pagination->create_links(); ?>
		</section>
	</div>
</div>