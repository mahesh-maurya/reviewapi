<div class=" row" style="padding:1% 0;">
	<div class="col-md-11">
	
		<a class="btn btn-primary pull-right"  href="<?php echo site_url('site/createlistingimages?id=').$this->input->get('id'); ?>"><i class="icon-plus"></i>Create </a> &nbsp; 
	</div>
	
</div>
<div class="row">
	<div class="col-lg-12">
		<section class="panel">
			<header class="panel-heading">
                Listing Image Details of "<?php echo $before->name;?>" Listing
            </header>
			<table class="table table-striped table-hover fpTable lcnp" cellpadding="0" cellspacing="0" width="100%">
			<thead>
				<tr>
					<!--<th>Id</th>-->
<!--					<th>Listing</th>-->
					<th>Images</th>
					<th>Order</th>
					<th>Timestamp</th>
					<th> Actions </th>
				</tr>
			</thead>
			<tbody>
			   <?php foreach($table as $row) { ?>
					<tr>
						<!--<td><?php echo $row->id;?></td>-->
<!--						<td><?php echo $row->listing;?></td>-->
						<td><img src="<?php echo base_url('uploads')."/".$row->image; ?>" width="70px" height="auto"></td>
						<td><?php echo $row->order;?></td>
						<td><?php echo $row->timestamp;?></td>
						
						<td>
							<a href="<?php echo site_url('site/editlistingimages?id=').$row->id.'&listingid='.$row->listing;?>" class="btn btn-primary btn-xs">
								<i class="icon-pencil"></i>
							</a>
							<a href="<?php echo site_url('site/deletelistingimages?id=').$row->id.'&listingid='.$row->listing; ?>" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure you want to delete this item?');">
								<i class="icon-trash "></i>
							</a> 
						
						</td>
					</tr>
					<?php } ?>
			</tbody>
			</table>
		</section>
	</div>
</div>