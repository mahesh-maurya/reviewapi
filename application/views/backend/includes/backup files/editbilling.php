	    <section class="panel">
		    <header class="panel-heading">
				 Billing Details
			</header>
			<div class="panel-body">
			  <form class="form-horizontal tasi-form" method="post" action="<?php echo site_url('site/editbillingsubmit');?>" enctype= "multipart/form-data">
				<input type="text" id="normal-field" class="form-control" name="id" value="<?php echo set_value('id',$before->id);?>" style="display:none;">
				
				<div class=" form-group">
				  <label class="col-sm-2 control-label">listing</label>
				  <div class="col-sm-4">
					<?php
						
						echo form_dropdown('listing',$listing,set_value('listing',$before->listing),'class="chzn-select form-control" 	data-placeholder="Choose a Accesslevel..."');
					?>
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
				  <label class="col-sm-2 control-label">Payment Type</label>
				  <div class="col-sm-4">
					<?php
						
						echo form_dropdown('paymenttype',$paymenttype,set_value('paymenttype',$before->paymenttype),'class="chzn-select form-control" 	data-placeholder="Choose a Accesslevel..."');
					?>
				  </div>
				</div>
				<div class=" form-group">
				  <label class="col-sm-2 control-label" for="normal-field">Amount</label>
				  <div class="col-sm-4">
					<input type="text" id="normal-field" class="form-control" name="amount" value="<?php echo set_value('amount',$before->amount);?>">
				  </div>
				</div>
				
				<div class=" form-group">
				  <label class="col-sm-2 control-label">Period</label>
				  <div class="col-sm-4">
					<?php
						
						echo form_dropdown('period',$period,set_value('period',$before->period),'class="chzn-select form-control" 	data-placeholder="Choose a Accesslevel..."');
					?>
				  </div>
				</div>
				<div class=" form-group">
				  <label class="col-sm-2 control-label" for="normal-field">credits</label>
				  <div class="col-sm-4">
					<input type="text" id="normal-field" class="form-control" name="credits" value="<?php echo set_value('credits',$before->credits);?>">
				  </div>
				</div>
				
				<div class=" form-group">
				  <label class="col-sm-2 control-label">Payed To</label>
				  <div class="col-sm-4">
					<?php
						
						echo form_dropdown('payedto',$user,set_value('payedto',$before->payedto),'id="select2"class="chzn-select form-control" 	data-placeholder="Choose a User..."');
					?>
				  </div>
				</div>
				<div class=" form-group">
				  <label class="col-sm-2 control-label">&nbsp;</label>
				  <div class="col-sm-4">
				  <button type="submit" class="btn btn-primary">Save</button>
				  <a href="<?php echo site_url('site/viewbilling'); ?>" class="btn btn-secondary">Cancel</a>
				</div>
				</div>
			  </form>
			</div>
		</section>
