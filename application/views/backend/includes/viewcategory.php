<div class=" row" style="padding:1% 0;">
	<div class="col-md-12">
		<div class=" pull-right col-md-1 createbtn" ><a class="btn btn-primary" href="<?php echo site_url('site/createcategory'); ?>"><i class="icon-plus"></i>Create </a></div>
	</div>
</div>
<div class="row">
	<div class="col-lg-12">
		<section class="panel">
			<header class="panel-heading">
                Category Details
            </header>
			<table class="table table-striped table-hover" id="" cellpadding="0" cellspacing="0" >
			<thead>
				<tr>
					<th>Id</th>
					<th>Name</th>
					<th>Parent</th>
					<th> Actions </th>
				</tr>
			</thead>
			<tbody>
			   <?php foreach($table as $row) { ?>
					<tr>
						<td><?php echo $row->id; ?></td>
						<td><?php echo $row->name; ?></td>
						<td><?php echo $row->parent; ?></td>
						<td> <a class="btn btn-primary btn-xs" href="<?php echo site_url('site/editcategory?id=').$row->id;?>"><i class="icon-pencil"></i></a>
                                      <a class="btn btn-danger btn-xs" href="<?php echo site_url('site/deletecategory?id=').$row->id; ?>"><i class="icon-trash "></i></a>
									 
					  </td>
					</tr>
					<?php } ?>
			</tbody>
			</table>
		</section>
<?php echo $this->pagination->create_links(); ?>
	</div>
  </div>
