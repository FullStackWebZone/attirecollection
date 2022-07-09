<?php
	foreach($shipping_data as $row){
?>
    <div class="tab-pane fade active in" id="edit">
        <?php
			echo form_open(base_url() . 'admin/shipping/update/' . $row['shipping_id'], array(
				'class' => 'form-horizontal',
				'method' => 'post',
				'id' => 'shipping_edit'
			));
		?>
            <div class="panel-body">
        
            <div class="form-group">
                <label class="col-sm-4 control-label" for="demo-hor-1">
                    <?php echo translate('country'); ?>
                </label>
                <div class="col-sm-6">
                    <?php echo $this->
                    crud_model->select_html('country','country_id','country_name','edit','demo-chosen-select required', $row['country_id']); ?>
                </div>
            </div>
            
          
            <div class="form-group">
                <label class="col-sm-4 control-label" for="demo-hor-4">
                    <?php echo translate('shipping Cost'); ?>
                </label>
                <div class="col-sm-6">
                    <input type="text" name="shipping_cost"  id="demo-hor-4" class="form-control required" value="<?php echo $row['shipping_cost']; ?>" placeholder="<?php echo translate('shipping cost'); ?>">
                </div>
            </div>
            
            
            
        </div>
    	</form>
    </div>
<?php
	}
?>
<script>
	$(document).ready(function() {
		$("form").submit(function(e){
			return false;
		});
		$('.demo-chosen-select').chosen();
		$('.demo-cs-multiselect').chosen({width:'100%'});
	});
</script>