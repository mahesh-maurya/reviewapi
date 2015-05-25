	    <section class="panel">
		    <header class="panel-heading">
				 Videotag Details
			</header>
			<div class="panel-body">
			  <form class="form-horizontal tasi-form" method="post" action="<?php echo site_url('site/editvideotagsubmit');?>">
				<input type="hidden" id="normal-field" class="form-control" name="id" value="<?php echo set_value('id',$before->id);?>" style="display:none;">
				
				<div class=" form-group">
				  <label class="col-sm-2 control-label">Video</label>
				  <div class="col-sm-4">
					<?php
						
						echo form_dropdown('video',$video,set_value('video',$before->video),'class="chzn-select form-control" 	data-placeholder="Choose a video..."');
					?>
				  </div>
				</div>
				
				<div class="form-group">
				  <label class="col-sm-2 control-label" for="normal-field">Tag</label>
				  <div class="col-sm-4">
					<input type="text" id="normal-field" class="form-control" name="tag" value="<?php echo set_value('tag',$before->tag);?>">
				  </div>
				</div>
				
				<div class=" form-group">
				  <label class="col-sm-2 control-label">&nbsp;</label>
				  <div class="col-sm-4">
				  <button type="submit" class="btn btn-primary">Save</button>
				  <a href="<?php echo site_url('site/viewvideotag'); ?>" class="btn btn-secondary">Cancel</a>
				</div>
				</div>
			  </form>
			</div>
		</section>
