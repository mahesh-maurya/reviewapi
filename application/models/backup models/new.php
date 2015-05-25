<div class=" row" style="padding:1% 0;">
	<div class="col-md-12">
		<div class=" pull-right col-md-1 createbtn" ><a class="btn btn-primary" href="<?php echo site_url('site/createbrandcategory?brandid='.$this->input->get('brandid')); ?>"><i class="icon-plus"></i>Create </a></div>
	</div>
</div>
<div class="row">
	<div class="col-lg-12">
		<section class="panel">
			<header class="panel-heading">
                Category Details
            </header>
            <?php
            print_r($tablemain);
echo "<br>";
            print_r($hastypes);
echo $gastypes['parent'];
echo "<br>";
            print_r($subcategory);
            ?>
			<form class="form-horizontal tasi-form" method="post" action="<?php echo site_url('site/editsubcategorysubmit?id='.$this->input->get('id').'&brandid='.$this->input->get('brandid'));?>" enctype= "multipart/form-data">
				<input type="hidden" id="normal-field" class="form-control" name="brandcategoryid" value="">
				
				
				<?php foreach($tablemain as $row) { ?>
				<div class="form-group">
                   <div class="col-md-12"><input type="checkbox" name="<?php echo $row->name;?>" value="<?php echo $row->id;?>" >
        	 <label><?php echo $row->name;?></label></div>
				  
				  <?php if($row->status==1){
                        foreach($subcategory as $row2) {
                    ?>
                    <div class="col-md-2">
                    <input type="checkbox" name="<?php echo $row2->name;?>" value="<?php echo $row2->id;?>" >
                     <label class="control-label" ><?php echo $row2->name;?></label>
				  </div>
				  <?php }
                    for($i=0;$i<15;$i++)
                    {
                    ?>
				  
				</div>
				<?php} }} ?>
					
				
				<div class=" form-group">
				  <label class="col-sm-2 control-label">&nbsp;</label>
				  <div class="col-sm-4">
				  <button type="submit" class="btn btn-primary">Save</button>
				  <a href="<?php echo site_url('site/viewonebrandcategories?brandid='.$this->input->get('brandid')); ?>" class="btn btn-secondary">Cancel</a>
				</div>
				</div>
			  </form>
		</section>
	</div>
  </div><?php
  print_r($tablemain);
  print_r($subcategory);
?>