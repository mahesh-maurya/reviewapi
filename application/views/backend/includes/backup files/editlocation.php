	    <section class="panel">
		    <header class="panel-heading">
				 Location Details
			</header>
			<?php print_r($before);?>
			<div class="panel-body">
			  <form class="form-horizontal tasi-form" method="post" action="<?php echo site_url('site/editlocationsubmit');?>" enctype= "multipart/form-data">
				<input type="hidden" id="normal-field" class="form-control" name="id" value="<?php echo $this->input->get('id');?>" style="display:none;">
				<input type="hidden" id="normal-field" class="form-control" name="cityid" value="<?php echo $this->input->get('cityid');?>" style="display:none;">
				
				<div class="form-group">
				  <label class="col-sm-2 control-label" for="normal-field">Name</label>
				  <div class="col-sm-4">
					<input type="text" id="normal-field" class="form-control" name="name" value="<?php echo set_value('name',$before['location']->name);?>">
				  </div>
				</div>
				
				<div class="form-group">
				  <label class="col-sm-2 control-label" for="normal-field">Pincode</label>
				  <div class="col-sm-4">
					<input type="text" id="normal-field" class="form-control" name="pincode" value="<?php echo set_value('pincode',$before['location']->pincode);?>">
				  </div>
				</div>
				<div class=" form-group">
				  <label class="col-sm-2 control-label">&nbsp;</label>
				  <div class="col-sm-4">
				  <button type="submit" class="btn btn-primary">Save</button>
				  <a href="<?php echo site_url('site/viewcity'); ?>" class="btn btn-secondary">Cancel</a>
				</div>
				</div>
			  </form>
			</div>
		</section>
