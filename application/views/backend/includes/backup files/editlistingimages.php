	    <section class="panel">
		    <header class="panel-heading">
				 listing Details
			</header>
			<div class="panel-body">
			  <form class="form-horizontal tasi-form" method="post" action="<?php echo site_url('site/editlistingimagessubmit');?>" enctype= "multipart/form-data">
				<input type="text" id="normal-field" class="form-control" name="id" value="<?php echo set_value('id',$beforelistingimages->id);?>" style="display:none;">
				
				<div class=" form-group">
				  <label class="col-sm-2 control-label" for="normal-field">image</label>
				  <div class="col-sm-4">
					<input type="file" id="normal-field" class="form-control" name="image" value="<?php echo set_value('image',$beforelistingimages->image);?>">
					<?php if($beforelistingimages->image == "")
						 { }
						 else
						 { ?>
							<img src="<?php echo base_url('uploads')."/".$beforelistingimages->image; ?>" width="140px" height="140px">
						<?php }
					?>
				  </div>
				</div>
				
				<div class="form-group">
				  <label class="col-sm-2 control-label" for="normal-field">Order</label>
				  <div class="col-sm-4">
					<input type="text" id="normal-field" class="form-control" name="order" value="<?php echo set_value('order',$beforelistingimages->order);?>">
				  </div>
				</div>
				
				<div class="form-group" style="display:none;">
				  <label class="col-sm-2 control-label" for="normal-field">Listingid</label>
				  <div class="col-sm-4">
					<input type="text" id="normal-field" class="form-control" name="listing" value="<?php echo $listing;?>">
				  </div>
				</div>
				<div class=" form-group">
				  <label class="col-sm-2 control-label">&nbsp;</label>
				  <div class="col-sm-4">
				  <button type="submit" class="btn btn-primary">Save</button>
				  <a href="<?php echo site_url('site/viewlisting'); ?>" class="btn btn-secondary">Cancel</a>
				</div>
				</div>
			  </form>
			</div>
		</section>
