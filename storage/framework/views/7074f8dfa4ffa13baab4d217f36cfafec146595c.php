<!-- Submit MT4 MODAL modal -->
<div id="submitmt4modal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header ">
                <h4 class="modal-title ">Subscribe to subscription Trading</h4>
                <button type="button" class="close " data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body ">
                <form role="form" method="post" action="<?php echo e(route('savemt4details')); ?>">
                    <?php echo csrf_field(); ?>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label class="">Subscription Duration</label>
                            <select class="form-control  " onchange="calcAmount(this)" name="duration" class="duration"
                                id="duratn">
                                <option value="default">Select duration</option>
                                <option>Monthly</option>
                                <option>Quaterly</option>
                                <option>Yearly</option>
                            </select>
                        </div>

                        <div class="form-group col-md-6">
                            <label class="">Amount to Pay</label>
                            <input class="form-control subamount  " type="text" id="amount" disabled><br />

                        </div>
                        <div class="form-group col-md-6">
                            <label class="">Account type</label>
                            <select class="form-control" name="metatrader">
                                <option value="default">Select account type</option>
                                <option>MT4</option>
                                <option>MT5</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label class=" ">Login*:</label>
                            <input class="form-control" type="text" name="login" required>
                            <?php $__errorArgs = ['login'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="text-danger"><?php echo e($message); ?></span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="form-group col-md-6">
                            <label class=" ">Account Password*:</label>
                            <input class="form-control  " type="text" name="passwrd" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label class=" ">Account Name*:</label>
                            <input class="form-control  " type="text" name="name" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label class=" ">Account Type:</label>
                            <input class="form-control  " Placeholder="E.g. Standard" type="text" name="acntype"
                                required>
                        </div>
                        <div class="form-group col-md-6">
                            <label class=" ">Currency*:</label>
                            <input class="form-control  " Placeholder="E.g. USD" type="text" name="currency"
                                required>
                        </div>
                        <div class="form-group col-md-6">
                            <label class=" ">Leverage*:</label>
                            <input class="form-control  " Placeholder="E.g. 1:500" type="text" name="leverage"
                                required>
                        </div>
                        <div class="form-group col-md-6">
                            <label class=" ">Server*:</label>
                            <input class="form-control  " Placeholder="E.g. HantecGlobal-live" type="text"
                                name="server" required>
                        </div>
                        <div class="form-group col-12">
                            <small class="">Amount will be deducted from your Account
                                balance</small>
                        </div>
                        <div class="form-group col-md-6">
                            <input id="amountpay" type="hidden" name="amount">
                            <input type="submit" class="btn btn-primary" value="Subscribe Now">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /plans Modal -->
<script type="text/javascript">
    function calcAmount(sub) {
        if (sub.value == "Quaterly") {
            var amount = document.getElementById('amount');
            var amountpay = document.getElementById('amountpay');
            amount.value = '<?php echo $settings->currency . $settings->quarterlyfee; ?>';
            amountpay.value = '<?php echo $settings->quarterlyfee; ?>';
        }
        if (sub.value == "Yearly") {
            var amount = document.getElementById('amount');
            var amountpay = document.getElementById('amountpay');
            amount.value = '<?php echo $settings->currency . $settings->yearlyfee; ?>';
            amountpay.value = '<?php echo $settings->yearlyfee; ?>';
        }
        if (sub.value == "Monthly") {
            var amount = document.getElementById('amount');
            var amountpay = document.getElementById('amountpay');
            amount.value = '<?php echo $settings->currency . $settings->monthlyfee; ?>';
            amountpay.value = '<?php echo $settings->monthlyfee; ?>';
        }
    }
</script>
<?php /**PATH /Users/macbookair/Documents/Brynamics/OnlineTrader/onlinetrade/resources/views/millage/user/modals.blade.php ENDPATH**/ ?>