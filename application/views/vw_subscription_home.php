<?php


$orderAmount = (empty($grand_total)) ? '0' : $grand_total;
$track_id = (empty($track_id)) ? '0' : $track_id;
$benefitPay = base_url() . 'benefitPay/API/Request.php';
?>
<!DOCTYPE html>
<html>

<head> </head>

<body>

    <div class="se-pre-con"></div>
    <div style="display:none">
        <form action="<?php echo $benefitPay; ?>" method="POST" name="benefitPayGateway" id="benefitPayGateway">
            <input type="hidden" name="track_id" value="<?php echo $track_id; ?>" />
            <input type="hidden" name="amt" value="<?php echo $orderAmount; ?>" />
            <input type="submit" value="Pay">
        </form>
    </div>
</body>
<script>
    document.getElementById("benefitPayGateway").submit();
</script>

</html>