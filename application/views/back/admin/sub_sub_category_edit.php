<?php
	foreach($sub_sub_category_data as $row){
?>
 
<div>
	<?php
        echo form_open(base_url() . 'admin/sub_sub_category/update/' . $row['sub_sub_category_id'], array(
            'class' => 'form-horizontal',
            'method' => 'post',
            'id' => 'sub_sub_category_edit',
            'enctype' => 'multipart/form-data'
        ));
    ?>
        <div class="panel-body">
            <div class="form-group">
                <label class="col-sm-4 control-label" for="demo-hor-inputemail">
                	<?php echo translate('sub-sub-category_name');?>
                    	</label>
                <div class="col-sm-6">
                    <input type="text" name="sub_sub_category_name" value="<?php echo $row['sub_sub_category_name'];?>" class="form-control required" placeholder="<?php echo translate('sub-sub_category_name'); ?>" >
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-4 control-label" for="demo-hor-2"><?php echo translate('sub-sub_category_banner');?></label>
                <div class="col-sm-6">
                    <span class="pull-left btn btn-default btn-file">
                        <?php echo translate('select_sub-sub_category_banner');?>
                        <input type="file" name="img" id='imgInp' accept="image">
                    </span>
                    <br><br>
                    <span id='wrap' class="pull-left" >
                        <?php
							if(file_exists('uploads/sub_sub_category_image/'.$row['banner'])){
						?>
						<img src="<?php echo base_url(); ?>uploads/sub_sub_category_image/<?php echo $row['banner']; ?>" width="100%" id='blah' />  
						<?php
							} else {
						?>
						<img src="<?php echo base_url(); ?>uploads/sub_sub_category_image/default.jpg" width="100%" id='blah' />
						<?php
							}
						?> 
                    </span>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-4 control-label"><?php echo translate('sub_category');?></label>
                <div class="col-sm-6">
                    <?php echo $this->crud_model->select_html('sub_category','sub_category','sub_category_name','edit','demo-chosen-select required',$row['sub_category'],'digital',NULL); ?>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-4 control-label"><?php echo translate('brands');?></label>
                <div class="col-sm-6">
                    <?php
                        echo $this->crud_model->select_html('brand','brand','name','edit','demo-cs-multiselect',$row['brand']);
                    ?>
                </div>
            </div>
            <div class="form-group" <?php if($this->crud_model->get_settings_value('general_settings', 'product_affiliation_set', 'value') != 'ok') { ?> style="display: none" <?php } ?>>
                <label class="col-sm-4 control-label" for="demo-hor-1">
                    <?php echo translate('affiliation');?>
                </label>
                <div class="col-sm-6 pt-5">
                    <input type="checkbox" name="affiliation" <?= $row['affiliation'] == 1 ? " checked='checked' ":"" ?> class="form-control required  affiliation-check">
                </div>
            </div>
            <div class="form-group" <?php if($this->crud_model->get_settings_value('general_settings', 'product_affiliation_set', 'value') != 'ok') { ?> style="display: none" <?php } ?>>
                <label class="col-sm-4 control-label" for="demo-hor-1">
                    <?php echo translate('affiliation_points');?>
                </label>
                <div class="col-sm-6 control-label">
                    <input type="number" min="0.0" step="0.5"  name="affiliation_points" value="<?= $row['affiliation_points'] ?>" class="form-control required">
                </div>
            </div>
        </div>
    </form>
</div>
<?php
	}
?>

<script type="text/javascript">
    $(document).ready(function() {
        $('.demo-chosen-select').chosen();
        $('.demo-cs-multiselect').chosen({width:'100%'});
        var affiliation_check = document.querySelector('.affiliation-check');
        var affiliation_switch = new Switchery(affiliation_check);
    });


	$(document).ready(function() {
		$("form").submit(function(e){
			event.preventDefault();
		});
	});
	
	function readURL(input) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();
	
			reader.onload = function(e) {
				$('#wrap').hide('fast');
				$('#blah').attr('src', e.target.result);
				$('#wrap').show('fast');
			}
			reader.readAsDataURL(input.files[0]);
		}
	}
	
	$("#imgInp").change(function() {
		readURL(this);
	});
</script>	
