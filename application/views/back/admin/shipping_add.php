<div>
	<?php
		echo form_open(base_url() . 'admin/shipping/do_add/', array(
			'class' => 'form-horizontal',
			'method' => 'post',
			'id' => 'shipping_add'
		));
	?>
        <div class="panel-body">
        
            <div class="form-group">
                <label class="col-sm-4 control-label" for="demo-hor-1">
                    <?php echo translate('country'); ?>
                </label>
               <div class="col-sm-6">
                    <?php echo $this->crud_model->select_html('country','country_id','country_name','add','demo-chosen-select required'); 
                    ?>
                </div>
            </div>
            
          
            <div class="form-group">
                <label class="col-sm-4 control-label" for="demo-hor-4">
                    <?php echo translate('shipping Cost'); ?>
                </label>
                <div class="col-sm-6">
                    <input type="text"  name="shipping_cost" id="demo-hor-4" class="form-control required" placeholder="<?php echo translate('shipping cost'); ?>">
                </div>
            </div>
            
            
            
        </div>
	</form>
</div>

<script>
	$(document).ready(function() {
		$("form").submit(function(e){
			return false;
		});
		$('.demo-chosen-select').chosen();
		$('.demo-cs-multiselect').chosen({width:'100%'});
		//$('body .modal-dialog').find('.btn-purple').addClass('disabled');
	});
</script>