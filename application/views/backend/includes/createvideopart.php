<div class="row" style="padding:1% 0">
	<div class="col-md-12">
		<div class="pull-right">
			<a href="<?php echo site_url('site/viewvideopart'); ?>" class="btn btn-primary pull-right"><i class="icon-long-arrow-left"></i>&nbsp;Back</a>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-lg-12">
	    <section class="panel">
		    <header class="panel-heading">
				 Videopart Details
			</header>
			<div class="panel-body">
			  <form class="form-horizontal tasi-form" method="post" action="<?php echo site_url('site/createvideopartsubmit');?>">
			  
				<div class=" form-group">
				  <label class="col-sm-2 control-label">Video</label>
				  <div class="col-sm-4">
					<?php
						
						echo form_dropdown('video',$video,set_value('video'),'class="chzn-select form-control" 	data-placeholder="Choose a video..."');
					?>
				  </div>
				</div>
				
				<div class=" form-group">
				  <label class="col-sm-2 control-label" for="normal-field">Part</label>
				  <div class="col-sm-4">
					<input type="number" id="normal-field" class="form-control" name="part" value="<?php echo set_value('part');?>">
				  </div>
				</div>
				<div class=" form-group">
				  <label class="col-sm-2 control-label" for="normal-field">Question</label>
				  <div class="col-sm-4">
				  <textarea name="question" id="" cols="20" rows="10" class="form-control tinymce">
                          <?php echo set_value('question');?>
                  </textarea>
				  </div>
				</div>
				
				<div class=" form-group">
				  <label class="col-sm-2 control-label" for="normal-field">Video Url</label>
				  <div class="col-sm-4">
					<input type="text" id="normal-field" class="form-control" name="videourl" value="<?php echo set_value('videourl');?>">
				  </div>
				</div>
				
				<div class=" form-group">
				  <label class="col-sm-2 control-label">Status</label>
				  <div class="col-sm-4">
					<?php
						
						echo form_dropdown('status',$status,set_value('status'),'class="chzn-select form-control" 	data-placeholder="Choose a Accesslevel..."');
					?>
				  </div>
				</div>
				
				<div class=" form-group">
				  <label class="col-sm-2 control-label">&nbsp;</label>
				  <div class="col-sm-4">
				  <button type="submit" class="btn btn-primary">Save</button>
				  <a href="<?php echo site_url('site/viewvideopart'); ?>" class="btn btn-secondary">Cancel</a>
				</div>
				</div>
			  </form>
			</div>
		</section>
	</div>
</div>