<div class=" row" style="padding:1% 0;">
	<div class="col-md-11">
	
		<a class="btn btn-primary pull-right"  href="<?php echo site_url('site/createbilling'); ?>"><i class="icon-plus"></i>Create </a> &nbsp; 
	</div>
	
</div>
<div class="row">
	<div class="col-lg-12">
		<section class="panel">
			<header class="panel-heading">
                Billing Details
            </header>
			<table class="table table-striped table-hover fpTable lcnp" cellpadding="0" cellspacing="0" width="100%">
			<thead>
				<tr>
					<!--<th>Id</th>-->
					<th>Listing</th>
					<th>User</th>
					<td>Payment Type</td>
					<td>Amount</td>
					<td>Period</td>
					<td>Credits</td>
					<th> Actions </th>
				</tr>
			</thead>
			<tbody>
			   <?php foreach($table as $row) { ?>
					<tr>
						<!--<td><?php echo $row->id;?></td>-->
						<td><?php echo $row->listingname;?></td>
						<td><?php echo $row->firstname." ".$row->lastname;?></td>
						<td><?php echo $row->paymenttypename;?></td>
						<td><?php echo $row->amount;?></td>
						<td><?php echo $row->period;?></td>
						<td><?php echo $row->credits;?></td>
						
						<td>
							<a href="<?php echo site_url('site/editbilling?id=').$row->id;?>" class="btn btn-primary btn-xs">
								<i class="icon-pencil"></i>
							</a>
							<a href="<?php echo site_url('site/deletebilling?id=').$row->id; ?>" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure you want to delete this item?');">
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