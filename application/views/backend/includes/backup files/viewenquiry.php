<div class=" row" style="padding:1% 0;">
	<div class="col-md-11">
	
		<a class="btn btn-primary pull-right"  href="<?php echo site_url('site/createenquiry'); ?>"><i class="icon-plus"></i>Create </a> &nbsp; 
	</div>
	
</div>
<div class="row">
	<div class="col-lg-12">
		<section class="panel">
			<header class="panel-heading">
                enquiry Details
            </header>
			<table class="table table-striped table-hover fpTable lcnp" cellpadding="0" cellspacing="0" width="100%">
			<thead>
				<tr>
					<!--<th>Id</th>-->
					<th>Name</th>
					<th>Listing</th>
					<td>Email</td>
					<td>Phone No</td>
					<td>Timestamp</td>
					<th> Actions </th>
				</tr>
			</thead>
			<tbody>
			   <?php foreach($table as $row) { ?>
					<tr>
						<!--<td><?php echo $row->id;?></td>-->
						<td><?php echo $row->name;?></td>
						<td><?php echo $row->listingname;?></td>
						<td><?php echo $row->email;?></td>
						<td><?php echo $row->phone;?></td>
						<td><?php echo $row->timestamp;?></td>
						
						<td>
							<a href="<?php echo site_url('site/editenquiry?id=').$row->id;?>" class="btn btn-primary btn-xs">
								<i class="icon-pencil"></i>
							</a>
							<a href="<?php echo site_url('site/deleteenquiry?id=').$row->id; ?>" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure you want to delete this item?');">
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