<div class="row">
	<div class="col-lg-12">
	    <section class="panel">
		    <header class="panel-heading">
				 Related Videos Details
			</header>
			<div class="panel-body">
				<form class="form-horizontal row-fluid" method="post" action="<?php echo site_url('site/createrelatedvideossubmit');?>" enctype= "multipart/form-data">
					<div class="form-group">
						<label class="col-sm-2 control-label">Videoid</label>
						<div class="col-sm-4">
						<?php
						
						echo form_dropdown('videoid',$videoid,set_value('videoid'),'class="chzn-select form-control"');
					?>
<!--						  <input type="text" id="normal-field" class="form-control" name="videoid" value="<?php echo set_value('videoid');?>">-->
						</div>
					</div>		
				<div class="form-group">
						<label class="col-sm-2 control-label">Related Video id</label>
						<div class="col-sm-4">
						<?php
						
						echo form_dropdown('relatedvideoid',$relatedvideoid,set_value('relatedvideoid'),'class="chzn-select form-control"');
					?>
<!--						  <input type="text" id="normal-field" class="form-control" name="videoid" value="<?php echo set_value('videoid');?>">-->
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