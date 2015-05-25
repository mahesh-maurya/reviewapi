	    <section class="panel">
		    <header class="panel-heading">
				 add Details
			</header>
			<div class="panel-body">
			  <form class="form-horizontal tasi-form" method="post" action="<?php echo site_url('site/editaddsubmit');?>" enctype= "multipart/form-data">
				<input type="text" id="normal-field" class="form-control" name="id" value="<?php echo set_value('id',$before->id);?>" style="display:none;">
				
				<div class="form-group">
				  <label class="col-sm-2 control-label" for="normal-field">Name</label>
				  <div class="col-sm-4">
					<input type="text" id="normal-field" class="form-control" name="name" value="<?php echo set_value('name',$before->name);?>">
				  </div>
				</div>
				
				
				<div class=" form-group">
				  <label class="col-sm-2 control-label">position</label>
				  <div class="col-sm-4">
					<?php
						
						echo form_dropdown('position',$position,set_value('position',$before->position),'class="chzn-select form-control" 	data-placeholder="Choose a Accesslevel..."');
					?>
				  </div>
				</div>
				
				<div class=" form-group">
				  <label class="col-sm-2 control-label" for="normal-field">From Time</label>
				  <div class="col-sm-4">
                    <input type="date" class="form-control fromdate" name="fromtimestamp" value="<?php echo set_value('fromtimestamp',$before->fromtimestamp);?>">
				  </div>
				</div>
				<div class=" form-group">
				  <label class="col-sm-2 control-label" for="normal-field">To Time</label>
				  <div class="col-sm-4">
                    <input type="date" class="form-control todate" name="totimestamp" value="<?php echo set_value('totimestamp',$before->totimestamp);?>">
				  </div>
				</div>
				
				<div class=" form-group">
				  <label class="col-sm-2 control-label" for="normal-field">Details</label>
				  <div class="col-sm-4">
					<input type="text" id="normal-field" class="form-control" name="details" value="<?php echo set_value('details',$before->details);?>">
				  </div>
				</div>
				<div class=" form-group">
				  <label class="col-sm-2 control-label" for="normal-field">Image</label>
				  <div class="col-sm-4">
					<input type="file" id="normal-field" class="form-control" name="image" value="<?php echo set_value('image',$before->image);?>">
					<?php if($before->image == "")
						 { }
						 else
						 { ?>
							<img src="<?php echo base_url('uploads')."/".$before->image; ?>" width="140px" height="140px">
						<?php }
					?>
				  </div>
				</div>
				
				<div class=" form-group">
				  <label class="col-sm-2 control-label">&nbsp;</label>
				  <div class="col-sm-4">
				  <button type="submit" class="btn btn-primary">Save</button>
				  <a href="<?php echo site_url('site/viewadd'); ?>" class="btn btn-secondary">Cancel</a>
				</div>
				</div>
			  </form>
			</div>
		</section>
