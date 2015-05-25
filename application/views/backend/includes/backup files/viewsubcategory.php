<div class=" row" style="padding:1% 0;">
<!--
	<div class="col-md-12">
		<div class=" pull-right col-md-1 createbtn" ><a class="btn btn-primary" href="<?php echo site_url('site/createcategory'); ?>"><i class="icon-plus"></i>Create </a></div>
	</div>
-->
</div>
<div class="row">
	<div class="col-lg-12">
		<section class="panel">
			<header class="panel-heading">
                Sub-Category Details
            </header>
            <?php
           // print_r($check);
           // echo $brandcategoryid;
            ?>
            <div class="panel-body">
			  <form class="form-horizontal tasi-form" method="post" action="<?php echo site_url('site/editsubcategorysubmit?id='.$this->input->get('id').'&brandid='.$this->input->get('brandid'));?>" enctype= "multipart/form-data">
				<input type="hidden" id="normal-field" class="form-control" name="brandcategoryid" value="<?php echo $brandcategoryid;?>">
				<?php
                  for($i=0;$i<8;$i+=3)
                  {
                      
                  ?>
				<div class="form-group">
				  <label class="col-sm-2 control-label" for="normal-field"><?php echo $check[$i];?></label>
				  <div class="col-sm-4">
					<input type="checkbox" class="form-control" name="<?php echo $check[$i];?>" value="<?php echo $check[$i+1];?>" <?php echo $check[$i+2];?>>
					
				  </div>
				</div>
				<?php
                  }
                  ?>
				
				<div class=" form-group">
				  <label class="col-sm-2 control-label">&nbsp;</label>
				  <div class="col-sm-4">
				  <button type="submit" class="btn btn-primary">Save</button>
				  <a href="<?php echo site_url('site/viewonebrandcategories?brandid='.$this->input->get('brandid')); ?>" class="btn btn-secondary">Cancel</a>
				</div>
				</div>
			  </form>
			</div>
<!--
			<table cellpadding="0" cellspacing="0" >
			
				<tr>
					<td> Men </td><td><input type="checkbox" name="men" value="1" /> </td>
				</tr>
				<tr>
					<td> Women </td><td><input type="checkbox" name="women" value="2" /></td>
				</tr>
				<tr>
					<td> Kids </td><td><input type="checkbox" name="kids" value="3" /></td>
				</tr>
			
			</table>
-->
		</section>
	</div>
  </div>
