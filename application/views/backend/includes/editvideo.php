	    <section class="panel">
		    <header class="panel-heading">
				 Video Details
			</header>
			<div class="panel-body">
			  <form class="form-horizontal tasi-form" method="post" action="<?php echo site_url('site/editvideosubmit');?>">
				<input type="hidden" id="normal-field" class="form-control" name="id" value="<?php echo set_value('id',$before->id);?>" style="display:none;">
				
				<div class=" form-group">
				  <label class="col-sm-2 control-label">User</label>
				  <div class="col-sm-4">
					<?php
						
						echo form_dropdown('user',$user,set_value('user',$before->user),'class="chzn-select form-control" 	data-placeholder="Choose a User..."');
					?>
				  </div>
				</div>
				
				<div class="form-group">
				  <label class="col-sm-2 control-label" for="normal-field">Title</label>
				  <div class="col-sm-4">
					<input type="text" id="normal-field" class="form-control" name="title" value="<?php echo set_value('title',$before->title);?>">
				  </div>
				</div>
				<div class=" form-group">
				  <label class="col-sm-2 control-label" for="normal-field">Description</label>
				  <div class="col-sm-4">
				  <textarea name="description" id="" cols="20" rows="10" class="form-control tinymce">
                          <?php echo set_value('description',$before->description);?>
                      </textarea>
<!--					<input type="text" id="normal-field" class="form-control" name="lastname" value="<?php echo set_value('lastname');?>">-->
				  </div>
				</div>
				
				<div class=" form-group">
				  <label class="col-sm-2 control-label" for="normal-field">Location</label>
				  <div class="col-sm-4">
					<input type="text" id="normal-field" class="form-control" name="location" value="<?php echo set_value('location',$before->location);?>">
				  </div>
				</div>
				<div class=" form-group">
				  <label class="col-sm-2 control-label" for="normal-field">Latitude</label>
				  <div class="col-sm-4">
					<input type="text" id="normal-field" class="form-control" name="lat" value="<?php echo set_value('lat',$before->lat);?>">
				  </div>
				</div>
				<div class=" form-group">
				  <label class="col-sm-2 control-label" for="normal-field">longitude</label>
				  <div class="col-sm-4">
					<input type="text" id="normal-field" class="form-control" name="long" value="<?php echo set_value('long',$before->long);?>">
				  </div>
				</div>
				
				<div class=" form-group">
				  <label class="col-sm-2 control-label" for="normal-field">Rating</label>
				  <div class="col-sm-4">
					<input type="number" id="normal-field" class="form-control" name="rating" value="<?php echo set_value('rating',$before->rating);?>">
				  </div>
				</div>
				<div class=" form-group">
				  <label class="col-sm-2 control-label" for="normal-field">Video Url</label>
				  <div class="col-sm-4">
					<input type="text" id="normal-field" class="form-control" name="videourl" value="<?php echo set_value('videourl',$before->videourl);?>">
				  </div>
				</div>
				
				<div class=" form-group">
				  <label class="col-sm-2 control-label">Category</label>
				  <div class="col-sm-4">
					<?php
						
						echo form_dropdown('category',$category,set_value('category',$before->category),'class="chzn-select form-control" 	data-placeholder="Choose a category..."');
					?>
				  </div>
				</div>
				
				<div class=" form-group">
				  <label class="col-sm-2 control-label">Status</label>
				  <div class="col-sm-4">
					<?php
						
						echo form_dropdown('status',$status,set_value('status',$before->status),'class="chzn-select form-control" 	data-placeholder="Choose a Accesslevel..."');
					?>
				  </div>
				</div>
				
				<div class=" form-group">
				  <label class="col-sm-2 control-label">&nbsp;</label>
				  <div class="col-sm-4">
				  <button type="submit" class="btn btn-primary">Save</button>
				  <a href="<?php echo site_url('site/viewvideo'); ?>" class="btn btn-secondary">Cancel</a>
				</div>
				</div>
			  </form>
			</div>
		</section>
