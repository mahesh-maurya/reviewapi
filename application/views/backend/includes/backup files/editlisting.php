	    <section class="panel">
		    <header class="panel-heading">
				 listing Details
			</header>
			<div class="panel-body">
			  <form class="form-horizontal tasi-form" method="post" action="<?php echo site_url('site/editlistingsubmit');?>" enctype= "multipart/form-data">
				<input type="text" id="normal-field" class="form-control" name="id" value="<?php echo set_value('id',$before->id);?>" style="display:none;">
				
				<div class="form-group">
				  <label class="col-sm-2 control-label" for="normal-field">Name</label>
				  <div class="col-sm-4">
					<input type="text" id="normal-field" class="form-control" name="name" value="<?php echo set_value('name',$before->name);?>">
				  </div>
				</div>
				
				<div class=" form-group">
				  <label class="col-sm-2 control-label">User</label>
				  <div class="col-sm-4">
					<?php
						
						echo form_dropdown('user',$user,set_value('user',$before->user),'class="chzn-select form-control" 	data-placeholder="Choose a Accesslevel..."');
					?>
				  </div>
				</div>
				
				<div class=" form-group">
				  <label class="col-sm-2 control-label">Category</label>
				  <div class="col-sm-4">
					<?php
						echo form_multiselect('category[]', $category,$selectedcategory,'id="select2" class="form-control"');
					?>
				  </div>
				</div>
				
				<div class=" form-group">
				  <label class="col-sm-2 control-label">modeofpayment</label>
				  <div class="col-sm-4">
					<?php
						echo form_multiselect('modeofpayment[]', $modeofpayment,$selectedmodeofpayment,'id="select3" class="form-control"');
					?>
				  </div>
				</div>
				<div class=" form-group">
				  <label class="col-sm-2 control-label">daysofoperation</label>
				  <div class="col-sm-4">
					<?php
						echo form_multiselect('daysofoperation[]', $daysofoperation,$selecteddaysofoperation,'id="select4" class="form-control"');
					?>
				  </div>
				</div>
				<div class=" form-group">
				  <label class="col-sm-2 control-label" for="normal-field">Latitude</label>
				  <div class="col-sm-4">
					<input type="text" id="normal-field" class="form-control" name="lat" value="<?php echo set_value('lat',$before->lat);?>">
				  </div>
				</div>
				<div class=" form-group">
				  <label class="col-sm-2 control-label" for="normal-field">Longitude</label>
				  <div class="col-sm-4">
					<input type="text" id="normal-field" class="form-control" name="long" value="<?php echo set_value('long',$before->long);?>">
				  </div>
				</div>
				
				<div class=" form-group">
				  <label class="col-sm-2 control-label" for="normal-field">Address</label>
				  <div class="col-sm-4">
					<input type="text" id="normal-field" class="form-control" name="address" value="<?php echo set_value('address',$before->address);?>">
				  </div>
				</div>
				
				<div class=" form-group">
				  <label class="col-sm-2 control-label">city</label>
				  <div class="col-sm-4">
					<?php
						
						echo form_dropdown('city',$city,set_value('city',$before->city),'class="chzn-select form-control" 	data-placeholder="Choose a Accesslevel..."');
					?>
				  </div>
				</div>
				
				<div class=" form-group">
				  <label class="col-sm-2 control-label" for="normal-field">Pincode</label>
				  <div class="col-sm-4">
					<input type="text" id="normal-field" class="form-control" name="pincode" value="<?php echo set_value('pincode',$before->pincode);?>">
				  </div>
				</div>
				
				<div class=" form-group">
				  <label class="col-sm-2 control-label" for="normal-field">state</label>
				  <div class="col-sm-4">
					<input type="text" id="normal-field" class="form-control" name="state" value="<?php echo set_value('state',$before->state);?>">
				  </div>
				</div>
				
				<div class=" form-group">
				  <label class="col-sm-2 control-label" for="normal-field">country</label>
				  <div class="col-sm-4">
					<input type="text" id="normal-field" class="form-control" name="country" value="<?php echo set_value('country',$before->country);?>">
				  </div>
				</div>
				
				<div class=" form-group">
				  <label class="col-sm-2 control-label" for="normal-field">Description</label>
				  <div class="col-sm-4">
					<input type="text" id="normal-field" class="form-control" name="description" value="<?php echo set_value('description',$before->description);?>">
				  </div>
				</div>
				
				<div class=" form-group">
				  <label class="col-sm-2 control-label" for="normal-field">Contact</label>
				  <div class="col-sm-4">
					<input type="number" id="normal-field" class="form-control" name="contact" value="<?php echo set_value('contact',$before->contactno);?>">
				  </div>
				</div>
				
				<div class=" form-group">
				  <label class="col-sm-2 control-label" for="normal-field">Email</label>
				  <div class="col-sm-4">
					<input type="email" id="normal-field" class="form-control" name="email" value="<?php echo set_value('email',$before->email);?>">
				  </div>
				</div>
				
				<div class=" form-group">
				  <label class="col-sm-2 control-label" for="normal-field">Website</label>
				  <div class="col-sm-4">
					<input type="text" id="normal-field" class="form-control" name="website" value="<?php echo set_value('website',$before->website);?>">
				  </div>
				</div>
				
				<div class="form-group">
					<label class="col-sm-2 control-label"> Facebook</label>
					<div class="col-sm-4">
					  <input type="text" id="" name="facebookuserid" class="form-control" value="<?php echo set_value('facebookuserid',$before->facebook); ?>">
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">googleplus</label>
					<div class="col-sm-4">
					  <input type="text" id="" name="googleplus" class="form-control" value="<?php echo set_value('googleplus',$before->googleplus); ?>">
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">twitter</label>
					<div class="col-sm-4">
					  <input type="text" id="" name="twitter" class="form-control" value="<?php echo set_value('twitter',$before->twitter); ?>">
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">Year Of Establishment</label>
					<div class="col-sm-4">
					  <input type="text" id="" name="yearofestablishment" class="form-control" value="<?php echo set_value('yearofestablishment',$before->yearofestablishment); ?>">
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">Time Of Operation Start</label>
					<div class="col-sm-4">
					  <input type="text" id="" name="timeofoperation_start" class="form-control" value="<?php echo set_value('timeofoperation_start',$before->timeofoperation_start); ?>">
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">Time Of Operation End</label>
					<div class="col-sm-4">
					  <input type="text" id="" name="timeofoperation_end" class="form-control" value="<?php echo set_value('timeofoperation_end',$before->timeofoperation_end); ?>">
					</div>
				</div>
				
				<div class=" form-group">
				  <label class="col-sm-2 control-label">type</label>
				  <div class="col-sm-4">
					<?php
						
						echo form_dropdown('type',$type,set_value('type',$before->type),'class="chzn-select form-control" 	data-placeholder="Choose a Accesslevel..."');
					?>
				  </div>
				</div>
				
				<div class="form-group">
					<label class="col-sm-2 control-label">Credits</label>
					<div class="col-sm-4">
					  <input type="text" id="" name="credits" class="form-control" value="<?php echo set_value('credits',$before->credits); ?>">
					</div>
				</div>
				<div class=" form-group">
				  <label class="col-sm-2 control-label">isverified</label>
				  <div class="col-sm-4">
					<?php
						
						echo form_dropdown('isverified',$isverified,set_value('isverified',$before->isverified),'class="chzn-select form-control" 	data-placeholder="Choose a Accesslevel..."');
					?>
				  </div>
				</div>
				
				<div class="form-group">
					<label class="col-sm-2 control-label">video</label>
					<div class="col-sm-4">
					  <input type="text" id="" name="video" class="form-control" value="<?php echo set_value('video',$before->video); ?>">
					</div>
				</div>
				
				<div class=" form-group">
				  <label class="col-sm-2 control-label" for="normal-field">Logo</label>
				  <div class="col-sm-4">
					<input type="file" id="normal-field" class="form-control" name="logo" value="<?php echo set_value('logo',$before->logo);?>">
					<?php if($before->logo == "")
						 { }
						 else
						 { ?>
							<img src="<?php echo base_url('uploads')."/".$before->logo; ?>" width="140px" height="140px">
						<?php }
					?>
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
