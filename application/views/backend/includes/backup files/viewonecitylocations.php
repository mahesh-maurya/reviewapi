<div class=" row" style="padding:1% 0;">
	<div class="col-md-12">
	
		<a class="btn btn-primary pull-right"  href="<?php echo site_url('site/createlocation?cityid='.$this->input->get('cityid')); ?>"><i class="icon-plus"></i>Create </a> &nbsp; 
	</div>
	
</div>
<div class="row">
	<div class="col-lg-12">
		<section class="panel">
			<header class="panel-heading">
                Location Details
            </header>
			<table class="table table-striped table-hover fpTable lcnp" cellpadding="0" cellspacing="0" width="100%">
			<thead>
				<tr>
					<!--<th>Id</th>-->
					<th>Location Name</th>
					<th>Pincode</th>
					<th> City Name</th>
					<th> Actions </th>
				</tr>
			</thead>
			<tbody>
			   <?php foreach($table as $row) { ?>
					<tr>
						<!--<td><?php echo $row->id;?></td>-->
						<td><?php echo $row->name;?></td>
						<td><?php echo $row->pincode;?></td>
						<td><?php echo $row->cityname;?></td>
						
						<td>
							
							<a href="<?php echo site_url('site/editlocation?id=').$row->id.'&cityid='.$this->input->get('cityid');?>" class="btn btn-primary btn-xs">
								<i class="icon-pencil"></i>
							</a>
							<a href="<?php echo site_url('site/deletelocation?id=').$row->id.'&cityid='.$this->input->get('cityid'); ?>" class="btn btn-danger btn-xs">
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