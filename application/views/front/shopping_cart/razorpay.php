<form method="POST" action="https://api.razorpay.com/v1/checkout/embedded" id="form">
	  <input type="hidden" name="key_id" value="rzp_test_JFR9eWbWme1mSu">
	  <input type="hidden" name="order_id" value="<?php $data->id ?>">
	  <input type="hidden" name="name" value="Attire Collection">
	  <input type="hidden" name="description" value="A Wild Sheep Chase">
	  <input type="hidden" name="image" value="https://cdn.razorpay.com/logos/EQorYSkjiya4Qt_medium.jpeg">
	  <input type="hidden" name="prefill[name]" value="Gaurav Kumar">
	  <input type="hidden" name="prefill[contact]" value="9123456780">
	  <input type="hidden" name="prefill[email]" value="gaurav.kumar@example.com">
	  <input type="hidden" name="notes[shipping address]" value="L-16, The Business Centre, 61 Wellfield Road, New Delhi - 110001">
	  <input type="hidden" name="callback_url" value="<?php echo base_url()?>/home/razorpayipn">
	<input type="hidden" name="cancel_url" value="<?php echo base_url()?>/home/cancelrazorpay">
	  <button>Submit</button>
	</form>
<div>Please wait...</div>
<script>
var form = document.getElementById("form");
form.submit();
</script>