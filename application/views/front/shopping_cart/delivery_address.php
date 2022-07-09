<style>
    .text_size{
        position: relative;
        text-align: center;
        font-weight: 500;
        font-size: large;
        top: 13px;
    }
</style>
<?php
    $username   = "";
    $surname    = "";
    $email      = "";
    $phone      = "";
    $address1   = "";
    $address2   = "";
    $langlat    = "";
    $address    = "";
    $zip        = "";
if($this->session->userdata('user_login')== "yes"){
    $user       = $this->session->userdata('user_id'); 
    $user_data  = $this->db->get_where('user',array('user_id'=>$user))->row(); 
    $username   = $user_data->username;
    $surname    = $user_data->surname;  
    $email      = $user_data->email; 
    $phone      = $user_data->phone; 
    $address1   = $user_data->address1; 
    $address2   = $user_data->address2; 
    $langlat    = $user_data->langlat; 
    $address    = $address1.$address2;
    $zip        = $user_data->zip; 
  } 
?>
<div class="col-md-12 text_size">
    <p>All Products will be deliver only in Bahrain.</p>
</div>
<div class="row ">
    <div class="col-md-6">
        <div class="form-group">
            <input class="form-control required" id="first_name" value="<?php echo $username ;?>" name="firstname" type="text" placeholder="<?php echo translate('first_name');?>">
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <input class="form-control required" value="<?php echo $surname ;?>" name="lastname" type="text" placeholder="<?php echo translate('last_name');?>">
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <input class="form-control required address" name="address1" value="<?php echo $address1; ?>" type="text" placeholder="<?php echo translate('address_line_1');?>">
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <input class="form-control address" name="address2" value="<?php echo $address2; ?>" type="text" placeholder="<?php echo translate('address_line_2 (any landmark)');?>">
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
    <select disabled class="form-control country selectpicker required" onChange="countryShip(this.value)" data-live-search="true" name="country"
    data-toggle="tooltip" title="<?php echo translate('select');?>" autocomplete="off">
    <!--<option value="0"><?php echo translate('country');?></option>-->
    <?php 
    foreach ($country as $row1) {
    
    ?>
    <option value="<?php echo $row1['country_id']; ?>"><?php echo $row1['country_name']; ?></option>
    <?php 
    
    }
    ?>
    </select>
    </div>
    </div>                
    <div class="col-md-6">
        <div class="form-group">
            <input class="form-control required"  name="zip" type="text" value="<?php echo $zip; ?>" placeholder="<?php echo translate('Postal Code/Block Number');?>">
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <input class="form-control required" value="<?php echo $email ;?>" name="email" type="text" placeholder="<?php echo translate('email');?>">
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <input class="form-control required" value="<?php echo $phone ;?>" name="phone" type="text" placeholder="<?php echo translate('phone_number');?>">
        </div>
    </div>

    <div class="col-sm-12" id="lnlat" style="display:none;">
        <div class="form-group">
            <div class="col-sm-12">
                <input id="langlat" value="" type="text" placeholder="langitude - latitude" name="langlat" class="form-control" readonly>
            </div>
        </div>
    </div>
    <div class="col-sm-12" id="maps" style="height:400px;">
        <div class="form-group">
            <div id="map-canvas" style="height:400px;">
            </div>
        </div>
    </div>

    <div class="col-md-12" style="display:none;">
        <div class="checkbox">
            <label>
                <input type="checkbox"> 
                <?php echo translate('ship_to_different_address_for_invoice');?>
            </label>
        </div>
    </div>

<?php /*
    <div class="col-md-12">
        <span class="btn btn-theme-dark float-right" onclick="load_payments();">
            <?php echo translate('next');?>
        </span>
    </div>
	<?php */ ?>

</div>


<input type="hidden" id="first" value="yes"/>

<script type="text/javascript">
    $(document).ready(function() {
        set_cart_map();
    });
</script>
