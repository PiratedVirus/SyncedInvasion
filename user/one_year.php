<?php
include '../dbconnect.php';
include 'helpers/sessions.php';
include 'helpers/sql_functions.php';
include 'templates/header.php';
?>
    <div class="container">
        <div class="col-md-12 text-center">
            <?php

            $MERCHANT_KEY = "dyadHfWp";
            $SALT = "BObuebfjDo";
            // Merchant Key and Salt as provided by Payu.

            //            $PAYU_BASE_URL = "https://sandboxsecure.payu.in";		// For Sandbox Mode
            $PAYU_BASE_URL = "https://secure.payu.in";			// For Production Mode

            $action = '';

            $posted = array();
            if(!empty($_POST)) {
                //print_r($_POST);
                foreach($_POST as $key => $value) {
                    $posted[$key] = $value;

                }
            }

            $formError = 0;

            if(empty($posted['txnid'])) {
                // Generate random transaction id
                $txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
            } else {
                $txnid = $posted['txnid'];
            }
            $hash = '';
            // Hash Sequence
            $hashSequence = "key|txnid|amount|productinfo|firstname|email|udf1|udf2|udf3|udf4|udf5|udf6|udf7|udf8|udf9|udf10";
            if(empty($posted['hash']) && sizeof($posted) > 0) {
                if(
                    empty($posted['key'])
                    || empty($posted['txnid'])
                    || empty($posted['amount'])
                    || empty($posted['firstname'])
                    || empty($posted['email'])
                    || empty($posted['phone'])
                    || empty($posted['productinfo'])
                    || empty($posted['surl'])
                    || empty($posted['furl'])
                    || empty($posted['service_provider'])
                ) {
                    $formError = 1;
                } else {
                    //$posted['productinfo'] = json_encode(json_decode('[{"name":"tutionfee","description":"","value":"500","isRequired":"false"},{"name":"developmentfee","description":"monthly tution fee","value":"1500","isRequired":"false"}]'));
                    $hashVarsSeq = explode('|', $hashSequence);
                    $hash_string = '';
                    foreach($hashVarsSeq as $hash_var) {
                        $hash_string .= isset($posted[$hash_var]) ? $posted[$hash_var] : '';
                        $hash_string .= '|';
                    }

                    $hash_string .= $SALT;


                    $hash = strtolower(hash('sha512', $hash_string));
                    $action = $PAYU_BASE_URL . '/_payment';
                }
            } elseif(!empty($posted['hash'])) {
                $hash = $posted['hash'];
                $action = $PAYU_BASE_URL . '/_payment';
            }
            ?>

            <script>
                var hash = '<?php echo $hash ?>';
                function submitPayuForm() {
                    if(hash == '') {
                        return;
                    }
                    var payuForm = document.forms.payuForm;
                    payuForm.submit();
                }
            </script>

            <body onload="submitPayuForm()">
            <h2 class="tabSubHeader text-center margin-top">MAKE A SECURE PAYMENT</h2>
            <hr class="greenUnderLine text-center">
            <br/>
            <img src="assets/img/credit-card.svg" height="150" alt="">
            <p style="font-size: 16px; color: #8E9AAE"  class="margin-bottom"> Your online transaction on Vishwachinmay is secure with the highest levels of transaction security currently available on the Internet. Vishwachinmay uses 128-bit encryption technology to protect your card information while securely transmitting it to the respective banks for payment processing. All credit card and debit card payments on Vishwachinmay are processed through secure and trusted payment gateways managed by leading banks. Banks now use the 3D Secure password service for online transactions, providing an additional layer of security through identity verification.  </p>


            <?php if($formError) { ?>

                <span style="color:red">Please fill all mandatory fields.</span>
                <br/>
                <br/>
            <?php } ?>
            <form  action="<?php echo $action; ?>" method="post" name="payuForm">
                <input type="hidden" name="key" value="<?php echo $MERCHANT_KEY ?>" />
                <input type="hidden" name="hash" value="<?php echo $hash ?>"/>
                <input type="hidden" name="txnid" value="<?php echo $txnid ?>" />
                <table>

                    <tr>

                        <td><input name="amount" hidden value="3999" /></td>

                        <td><input name="firstname" hidden id="firstname" value="<?php echo getUserName($conn, $id); ?>" /></td>
                    </tr>
                    <tr>

                        <td><input name="email" hidden id="email" value="<?php echo getUserEmail($conn, $id); ?>"  /></td>

                        <td><input name="phone" hidden value="<?php echo getUserMobile($conn, $id); ?>" /></td>
                    </tr>
                    <tr>

                        <td colspan="3"><textarea hidden name="productinfo">"Auto Mated Thing"</textarea></td>
                    </tr>
                    <tr>

                        <td colspan="3"><input name="surl" hidden value="https://test.vishwachinmayayurved.com/user/one_success" size="64" /></td>
                    </tr>
                    <tr>

                        <td colspan="3"><input name="furl" hidden value="https://test.vishwachinmayayurved.com/user/failure" size="64" /></td>
                    </tr>

                    <tr>
                        <td colspan="3"><input type="hidden" name="service_provider" value="payu_paisa" size="64" /></td>
                    </tr>

                </table>
                <?php if(!$hash) { ?>
                    <a href="browse_plans" class="text-center margin-top newBtn">CHANGE PLAN</a>
                    <input class="text-center margin-top newBtn" type="submit" value="PAY INR 3999 " />
                <?php } ?>
            </form>



        </div>
    </div>
<?php include 'templates/footer.php' ?>