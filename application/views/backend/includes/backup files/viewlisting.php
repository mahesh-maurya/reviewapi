<div class=" row" style="padding:1% 0;">
	<div class="col-md-11">
	
		<a class="btn btn-primary pull-right"  href="<?php echo site_url('site/createlisting'); ?>"><i class="icon-plus"></i>Create </a> &nbsp; 
	</div>
	
</div>
<div class="row">
	<div class="col-lg-12">
		<section class="panel">
			<header class="panel-heading">
                Listing Details
            </header>
			<table class="table table-striped table-hover fpTable lcnp" cellpadding="0" cellspacing="0" width="100%">
			<thead>
				<tr>
					<!--<th>Id</th>-->
					<th>Name</th>
					<th>Address</th>
					<td>Email</td>
					<td>Contact No</td>
					<th> Actions </th>
				</tr>
			</thead>
			<tbody>
			   <?php foreach($table as $row) { ?>
					<tr>
						<!--<td><?php echo $row->id;?></td>-->
						<td><?php echo $row->name;?></td>
						<td><?php echo $row->address;?></td>
						<td><?php echo $row->email;?></td>
						<td><?php echo $row->contactno;?></td>
						
						<td>
							<a href="<?php echo site_url('site/editlisting?id=').$row->id;?>" class="btn btn-primary btn-xs">
								<i class="icon-pencil"></i>
							</a>
							<a href="<?php echo site_url('site/deletelisting?id=').$row->id; ?>" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure you want to delete this item?');">
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