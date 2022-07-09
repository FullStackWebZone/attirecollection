<?php
class Razorpay {
    
   var $last_error;                 // holds the last error encountered
   
   var $ipn_log;                    // bool: log IPN results to text file?
   
   var $ipn_log_file;               // filename of the IPN log
   var $ipn_response;               // holds the IPN response from vouguepay   
   var $ipn_data = array();         // array contains the POST values for IPN
   
   var $fields = array();           // array holds the fields to submit to vouguepay

   
   function __construct() {
       require APPPATH .'libraries/razorpay/Razorpay.php';
      // initialization constructor.  Called when class is created.
      $CI=& get_instance();
      $CI->load->database();
  
      $this->razorpay_url = 'https://api.razorpay.com/v1/checkout/embedded';

      $this->last_error = '';
      
      $this->ipn_log = true; 
      $this->ipn_response = '';
      
      
   }
   
   function add_field($field, $value) {
     
            
      $this->fields["$field"] = $value;
   }

   function submit_razor_post() {
 
   

      echo "<html>\n";
    
      echo "<body onLoad=\"document.forms['razorpay_form'].submit();\">\n";
      
      echo "<form method=\"post\" name=\"razorpay_form\" ";
      echo "action=\"".$this->razorpay_url."\">\n";

      foreach ($this->fields as $name => $value) {
         echo "<input type=\"hidden\" name=\"$name\" value=\"$value\"/>\n";
      }
        
      echo "</form>\n";
      echo "</body></html>\n";
    
   }

   function ipn(){
     //need to code

   }
	function post_verify($data){
		
		echo $data['razorpay_order_id'];
		$razorpay_signature = $data['razorpay_signature'];
		$razorpay_payment_id = $data['razorpay_payment_id'];
		$razorpay_order_id = $data['razorpay_order_id'];
		$api = new Razorpay\Api\Api($data['razorpay_key_id'], $data['razorpay_secret_key']);
		$attrbutes  = array(
		'razorpay_signature'  => $razorpay_signature,
		'razorpay_payment_id'  => $razorpay_payment_id,
		'razorpay_order_id' => $razorpay_order_id
		);
		print_r($attrbutes);
		$order  = $api->utility->verifyPaymentSignature($attributes);
		return $order;
	}
}         
