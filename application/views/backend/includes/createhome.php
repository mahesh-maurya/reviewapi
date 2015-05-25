<div class="row">
	<div class="col-lg-12">
	    <section class="panel">
		    <header class="panel-heading">
				 Home Details
			</header>
			<div class="panel-body">
				<form class="form-horizontal row-fluid" method="post" action="<?php echo site_url('site/createhomesubmit');?>" enctype= "multipart/form-data">
					<div class="form-group">
						<label class="col-sm-2 control-label">Title</label>
						<div class="col-sm-4">
						  <input type="text" id="normal-field" class="form-control" name="title" value="<?php echo set_value('title');?>">
						</div>
					</div>		
				<div class="form-group">
						<label class="col-sm-2 control-label">Description</label>
						<div class="col-sm-4">
						  <textarea name="description" rows="5" cols="40"><?php echo set_value('description');?></textarea>
						</div>
					</div>	
					<div class=" form-group">
				  <label class="col-sm-2 control-label">Image</label>
				  <div class="col-sm-4">
					  <input type="file" id="normal-field" class="form-control" name="image" value="<?php echo set_value('image');?>">
				  </div>
				</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">&nbsp;</label>
						<div class="col-sm-4">	
							<button type="submit" class="btn btn-info">Submit</button>
						</div>
					</div>
				</form>
			</div>
		</section>
    </div>
</div>