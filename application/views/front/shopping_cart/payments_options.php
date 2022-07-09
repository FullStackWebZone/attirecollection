    <?php
    $system_title = $this->db->get_where('general_settings', array('type' => 'system_title'))->row()->value;
    $total = $this->cart->total();
    if ($this->crud_model->get_type_name_by_id('business_settings', '3', 'value') == 'product_wise') {
        $shipping = $this->crud_model->cart_total_it('shipping');
    } elseif ($this->crud_model->get_type_name_by_id('business_settings', '3', 'value') == 'fixed') {
        $shipping = $this->crud_model->get_type_name_by_id('business_settings', '2', 'value');
    }
    $tax = $this->crud_model->cart_total_it('tax');
    $grand = $total + $shipping + $tax;
    // echo $grand; 
    ?>
    <?php
    $p_set = $this->db->get_where('business_settings', array('type' => 'paypal_set'))->row()->value;
    $c_set = $this->db->get_where('business_settings', array('type' => 'cash_set'))->row()->value;
    $s_set = $this->db->get_where('business_settings', array('type' => 'stripe_set'))->row()->value;
    $c2_set = $this->db->get_where('business_settings', array('type' => 'c2_set'))->row()->value;
    $vp_set = $this->db->get_where('business_settings', array('type' => 'vp_set'))->row()->value;
    $pum_set = $this->db->get_where('business_settings', array('type' => 'pum_set'))->row()->value;
    $_set = $this->db->get_where('business_settings', array('type' => 'ssl_set'))->row()->value;
    $razorpay_set = $this->db->get_where('business_settings', array('type' => 'razorpay_set'))->row()->value;
    $balance = $this->wallet_model->user_balance();

    ?>

    <div class="row">

        <div class="cc-selector col-sm-3">
            <input id="benefitPay" style="display:block;" type="radio" checked name="payment_type" value="benefitPay" />
            <label class="drinkcard-cc" style="margin-bottom:0px; width:100%; overflow:hidden; " for="benefitPay" onclick="radio_check('benefitPay')">
                <img src="<?php echo base_url(); ?>template/front/img/preview/payments/DC.jpg" width=" 100%" height="100%" style=" text-align-last:center;" alt="<?php echo translate('benefitPay'); ?>" />

            </label>
        </div>

        <div class="cc-selector col-sm-3">
            <input id="benefitApp" style="display:block;" type="radio" name="payment_type" value="benefitApp" />
            <label class="drinkcard-cc" style="margin-bottom:0px; width:100%; overflow:hidden;" for="benefitApp" onclick="radio_check('benefitApp')">
                <!-- <button type="button" style="width: 100%;" class="inapp-btn" onclick="redirectobenefit()"></button> -->
                <img class="inapp-btn" src="<?php echo base_url(); ?>template/front/img/preview/payments/benefitpay.jpg" width=" 100%" height="100%" style="text-align-last:center;" alt="<?php echo translate('benefitApp'); ?>" />
            </label>
        </div>
        <?php
        if ($p_set == 'ok') {
        ?>
            <div class="cc-selector col-sm-3">
                <input id="visa" type="radio" style="display:block;" name="payment_type" value="paypal" />
                <label class="drinkcard-cc" style="margin-bottom:0px; width:100%; overflow:hidden; " for="visa" onclick="radio_check('visa')">
                    <img src="<?php echo base_url(); ?>template/front/img/preview/payments/paypal.jpg" width="100%" height="100%" style=" text-align-last:center;" alt="<?php echo translate('paypal'); ?>" />

                </label>
            </div>
        <?php
        }
        if ($s_set == 'ok') {
        ?>
            <div class="cc-selector col-sm-3">
                <input id="mastercardd" style="display:block;" type="radio" name="payment_type" value="stripe" />
                <label class="drinkcard-cc" style="margin-bottom:0px; width:100%; overflow:hidden; " for="mastercardd" id="customButtong" onclick="radio_check('mastercardd')">
                    <img src="<?php echo base_url(); ?>template/front/img/preview/payments/stripe.jpg" width="100%" height="100%" style=" text-align-last:center;" alt="<?php echo translate('stripe'); ?>" />

                </label>
            </div>
            <script>
                $(document).ready(function(e) {
                    //<script src="https://js.stripe.com/v2/"><script>
                    //https://checkout.stripe.com/checkout.js
                    var handler = StripeCheckout.configure({
                        key: '<?php echo $this->db->get_where('business_settings', array('type' => 'stripe_publishable'))->row()->value; ?>',
                        image: '<?php echo base_url(); ?>template/front/img/stripe.png',
                        token: function(token) {
                            // Use the token to create the charge with a server-side script.
                            // You can access the token ID with `token.id`
                            $('#cart_form').append("<input type='hidden' name='stripeToken' value='" + token.id + "' />");
                            if ($("#visa").length) {
                                $("#visa").prop("checked", false);
                            }
                            if ($("#mastercard").length) {
                                $("#mastercard").prop("checked", false);
                            }
                            $("#mastercardd").prop("checked", true);
                            notify('<?php echo translate('your_card_details_verified!'); ?>', 'success', 'bottom', 'right');
                            setTimeout(function() {
                                // $('#cart_form').submit();
                            }, 500);
                        }
                    });

                    $('#customButtong').on('click', function(e) {
                        // Open Checkout with further options
                        var total = $('#grand').html();
                        total = total.replace("<?php echo currency(); ?>", '');
                        //total = parseFloat(total.replace(",", ''));
                        total = total / parseFloat(<?php echo exchange(); ?>);
                        total = total * 100;
                        handler.open({
                            name: '<?php echo $system_title; ?>',
                            description: '<?php echo translate('pay_with_stripe'); ?>',
                            amount: total
                        });
                        e.preventDefault();
                    });

                    // Close Checkout on page navigation
                    $(window).on('popstate', function() {
                        handler.close();
                    });
                });
            </script>
        <?php
        }
        if ($c2_set == 'ok') {
        ?>
            <div class="cc-selector col-sm-3">
                <input id="mastercardc2" style="display:block;" type="radio" name="payment_type" value="c2" />
                <label class="drinkcard-cc" style="margin-bottom:0px; width:100%; overflow:hidden; " for="mastercardc2" onclick="radio_check('mastercardc2')">
                    <img src="<?php echo base_url(); ?>template/front/img/preview/payments/c2.jpg" width="100%" height="100%" style=" text-align-last:center;" alt="<?php echo translate('cash_on_delivery'); ?>" />

                </label>
            </div>
        <?php
        }
        if ($vp_set == 'ok') {
        ?>
            <div class="cc-selector col-sm-3">
                <input id="mastercardc3" style="display:block;" type="radio" name="payment_type" value="vp" />
                <label class="drinkcard-cc" style="margin-bottom:0px; width:100%; overflow:hidden; " for="mastercardc3" onclick="radio_check('mastercardc3')">
                    <img src="<?php echo base_url(); ?>template/front/img/preview/payments/vp.jpg" width="100%" height="100%" style=" text-align-last:center;" alt="<?php echo translate('voguepay'); ?>" />

                </label>
            </div>
        <?php
        }
        if ($pum_set == 'ok') {
        ?>
            <!--<div class="cc-selector col-sm-3">-->
            <!--    <input id="mastercard_pum" style="display:block;" type="radio" name="payment_type" value="pum"/>-->
            <!--    <label class="drinkcard-cc" style="margin-bottom:0px; width:100%; overflow:hidden; " for="" onclick="radio_check('mastercard_pum')">-->
            <!--        <img src="<?php echo base_url(); ?>template/front/img/preview/payments/CC.png" width="100%" height="100%" style=" text-align-last:center;" alt="<?php echo translate('payumoney'); ?>" />-->

            <!--    </label>-->
            <!--</div>-->
            <?php
        }
        /* if($ssl_set == 'ok'){
    ?>
    <div class="cc-selector col-sm-3">
        <input id="mastercardc4" style="display:block;" type="radio" name="payment_type" value="sslcommerz"/>
        <label class="drinkcard-cc" style="margin-bottom:0px; width:100%; overflow:hidden; " for="mastercardc4" onclick="radio_check('mastercardc4')">
                <img src="<?php echo base_url(); ?>template/front/img/preview/payments/sslcommerz.jpg" width="100%" height="100%" style=" text-align-last:center;" alt="<?php echo translate('sslcommerz');?>" />
               
        </label>
    </div>
    <?php
        } */
        if ($c_set == 'ok') {
            if ($this->crud_model->get_type_name_by_id('general_settings', '68', 'value') == 'ok') {
            ?>
                <div class="cc-selector col-sm-3">
                    <input id="mastercard" style="display:block;" type="radio" name="payment_type" value="cash_on_delivery" />
                    <label class="drinkcard-cc" style="margin-bottom:0px; width:100%; overflow:hidden; " for="mastercard" onclick="radio_check('mastercard')">
                        <img src="<?php echo base_url(); ?>template/front/img/preview/payments/cash.jpg" width="100%" height="100%" style=" text-align-last:center;" alt="<?php echo translate('cash_on_delivery'); ?>" />

                    </label>
                </div>

        <?php
            }
        }
        ?>
        <?php if ($razorpay_set == 'ok') {    ?>
            <!--<div class="cc-selector col-sm-3">-->
            <!--<input id="mastercard_razorpay" style="display:block;" type="radio" name="payment_type" value="razorpay"/>-->
            <!--<label class="drinkcard-cc" style="margin-bottom:0px; width:100%; overflow:hidden; " for="mastercard_razorpay" onclick="radio_check('mastercard_razorpay')">			-->
            <!--<img src="<?php echo base_url(); ?>template/front/img/preview/payments/DC.png" width="100%" height="100%" style=" text-align-last:center;" alt="<?php echo translate('razorpay'); ?>" />-->
            <!--</label>-->
            <!--</div>	-->
        <?php    }    ?>
        <?php
        if ($this->crud_model->get_type_name_by_id('general_settings', '84', 'value') == 'ok') {
            if ($this->session->userdata('user_login') == 'yes') {
        ?>
                <div class="cc-selector col-sm-3">
                    <input id="mastercarddd" style="display:block;" type="radio" name="payment_type" value="wallet" />
                    <label class="drinkcard-cc" style="margin-bottom:0px; width:100%; overflow:hidden; text-align:center;" for="mastercarddd" onclick="radio_check('mastercarddd')">
                        <img src="<?php echo base_url(); ?>template/front/img/preview/payments/wallet.jpg" width="100%" height="100%" style=" text-align-last:center;" alt="<?php echo translate('wallet');  ?> : <?php echo currency($this->wallet_model->user_balance()); ?>" />
                        <span style="position: absolute;margin-top: -8%;margin-left: -26px;color: #000000;"><?php echo currency($this->wallet_model->user_balance()); ?></span>
                    </label>
                </div>
        <?php
            }
        }
        ?>
    </div>
    <style>
        .cc-selector input {
            margin: 0;
            padding: 0;
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
        }

        .cc-selector input:active+.drinkcard-cc {
            opacity: 1;
            border: 4px solid #169D4B;
        }

        .cc-selector input:checked+.drinkcard-cc {
            -webkit-filter: none;
            -moz-filter: none;
            filter: none;
            border: 4px solid black;
        }

        .drinkcard-cc {
            cursor: pointer;
            background-size: contain;
            background-repeat: no-repeat;
            display: inline-block;
            -webkit-transition: all 100ms ease-in;
            -moz-transition: all 100ms ease-in;
            transition: all 100ms ease-in;
            -webkit-filter: opacity(.5);
            -moz-filter: opacity(.5);
            filter: opacity(.5);
            transition: all .6s ease-in-out;
            border: 4px solid transparent;
            border-radius: 5px !important;
        }

        .drinkcard-cc:hover {
            -webkit-filter: opacity(1);
            -moz-filter: opacity(1);
            filter: opacity(1);
            transition: all .6s ease-in-out;
            border: 4px solid #8400C5;

        }
    </style>

    <script>
        var amt = '<?= number_format((float)$grand, 3, '.', ''); ?>';
        var ref_no = makeref(16);
        var msg = 'appId="3967408009",merchantId="014930801",referenceNumber="' + ref_no + '",transactionAmount="' + amt + '",transactionCurrency="BHD"'
        var hash = CryptoJS.HmacSHA256(msg, "15qd61upnupdzyrkvaysdg9rh16alzv9lgx0cz2il91qi");
        var hashInBase64 = CryptoJS.enc.Base64.stringify(hash);

        function redirectobenefit() {
            InApp.open({
                merchantId: '014930801',
                transactionAmount: amt,
                transactionCurrency: 'BHD',
                hashedString: 'testhashedString',
                appId: '3967408009',
                referenceNumber: ref_no,
                lang: 'en',
                secure_hash: hashInBase64,
                showResult: '0'
            }, success_callback, error_callback, close_callback);
        }

        var success_callback = function(response) {
            var form = $("#cart_form");
            form.submit();
        };
        var error_callback = function(response) {
            $.ajax({
                method: "POST",
                url: "http://localhost/attirecollection/home/benefitPay_cancel/",
                data: {}
            });
            console.log("errorrrr: " + JSON.stringify(response));
        };
        var close_callback = function(response) {
            console.log("closeee: " + JSON.stringify(response));
        };

        function submit_form() {
            document.getElementById("benefitPayGateway").submit();
        }


        function makeref(length) {
            var result = '';
            var characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
            var charactersLength = characters.length;
            for (var i = 0; i < length; i++) {
                result += characters.charAt(Math.floor(Math.random() *
                    charactersLength));
            }
            return result;
        }
    </script>