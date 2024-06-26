<?php $__env->startSection('title', $title); ?>
<?php $__env->startSection('content'); ?>
    <div class="mt-2 mb-4">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
            <div>
                <h5 class="mb-0 h3 font-weight-400">Welcome, <?php echo e(Auth::user()->name); ?>!</h5>
            </div>
            <div class="py-2 ml-md-auto py-md-0">
                <a href="<?php echo e(route('deposits')); ?>" class="mr-2 btn btn-success d-lg-inline">Deposit</a>
                <a href="<?php echo e(route('withdrawalsdeposits')); ?>" class="mr-2 btn btn-danger d-lg-inline">Withdraw</a>
            </div>
        </div>
    </div>
    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.danger-alert','data' => []]); ?>
<?php $component->withName('danger-alert'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.success-alert','data' => []]); ?>
<?php $component->withName('success-alert'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
    <?php if(!empty($settings->welcome_message) and Auth::user()->created_at->diffInDays() <= 3): ?>
        <div class="row">
            <div class="col-12">
                <div class="py-4 alert alert-primary alert-dismissible fade show" role="alert">
                    <?php echo e($settings->welcome_message); ?>

                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <?php if($settings->enable_annoc == 'on' and !empty($settings->newupdate)): ?>
        <div class="row">
            <div class="col-12">
                <div class="py-4 alert alert-info alert-dismissible fade show" role="alert">
                    <?php echo e($settings->newupdate); ?>

                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <div class="row">
        <div class="col-sm-6 col-md-3">
            <div class="card card-stats card-round">
                <div class="card-body ">
                    <div class="row align-items-center">
                        <div class="col-icon">
                            <div class="icon-big text-center icon-primary bubble-shadow-small">
                                <i class="icon-wallet"></i>
                            </div>
                        </div>
                        <div class="col col-stats ml-3 ml-sm-0">
                            <div class="numbers">
                                <p class="card-category">Account balance</p>
                                <h4 class="card-title">
                                    <?php echo e($settings->currency); ?><?php echo e(number_format(Auth::user()->account_bal, 2, '.', ',')); ?>

                                </h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php if($mod['investment']): ?>
            <div class="col-sm-6 col-md-3">
                <div class="card card-stats card-round">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-icon">
                                <div class="icon-big text-center icon-success bubble-shadow-small">
                                    <i class="flaticon-coins"></i>
                                </div>
                            </div>
                            <div class="col col-stats ml-3 ml-sm-0">
                                <div class="numbers">
                                    <p class="card-category">Total Profit</p>
                                    <h4 class="card-title">
                                        <?php echo e($settings->currency); ?><?php echo e(number_format(Auth::user()->roi, 2, '.', ',')); ?></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <div class="col-sm-6 col-md-3">
            <div class="card card-stats card-round">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-icon">
                            <div class="icon-big text-center icon-secondary bubble-shadow-small">
                                <i class="flaticon-present"></i>
                            </div>
                        </div>
                        <div class="col col-stats ml-3 ml-sm-0">
                            <div class="numbers">
                                <p class="card-category">Bonus</p>
                                <h4 class="card-title">
                                    <?php echo e($settings->currency); ?><?php echo e(number_format(Auth::user()->bonus, 2, '.', ',')); ?></h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php if($mod['subscription']): ?>
            <div class="col-sm-6 col-md-3">
                <div class="card card-stats card-round">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-icon">
                                <div class="icon-big text-center icon-info bubble-shadow-small">
                                    <i class="icon-book-open"></i>
                                </div>
                            </div>
                            <div class="col col-stats ml-3 ml-sm-0">
                                <div class="numbers">
                                    <p class="card-category">Trading Accounts</p>
                                    <h4 class="card-title">
                                        <?php echo e($trading_accounts); ?>

                                    </h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <div class="col-sm-6 col-md-3">
            <div class="card card-stats card-round">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-icon">
                            <div class="icon-big text-center icon-primary bubble-shadow-small">
                                <i class="icon-share"></i>
                            </div>
                        </div>
                        <div class="col col-stats ml-3 ml-sm-0">
                            <div class="numbers">
                                <p class="card-category">Referral Bonus</p>
                                <h4 class="card-title">
                                    <?php echo e($settings->currency); ?><?php echo e(number_format(Auth::user()->ref_bonus, 2, '.', ',')); ?>

                                </h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-3">
            <div class="card card-stats card-round">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-icon">
                            <div class="icon-big text-center icon-warning bubble-shadow-small">
                                <i class="icon-arrow-down-circle"></i>
                            </div>
                        </div>
                        <div class="col col-stats ml-3 ml-sm-0">
                            <div class="numbers">
                                <p class="card-category">Total Deposit</p>
                                <h4 class="card-title">
                                    <?php echo e($settings->currency); ?><?php echo e(number_format($deposited, 2, '.', ',')); ?>

                                </h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php if($mod['investment'] || $mod['cryptoswap']): ?>
            <div class="col-sm-6 col-md-3">
                <div class="card card-stats card-round">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-icon">
                                <div class="icon-big text-center icon-danger bubble-shadow-small">
                                    <i class="icon-arrow-up-circle"></i>
                                </div>
                            </div>
                            <div class="col col-stats ml-3 ml-sm-0">
                                <div class="numbers">
                                    <p class="card-category">Total Withdrawal</p>
                                    <h4 class="card-title">
                                        <?php echo e($settings->currency); ?><?php echo e(number_format($total_withdrawal, 2, '.', ',')); ?>

                                    </h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
    <!-- End of Dashboard Stats  -->
    <div class="row d-none d-lg-block">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="card-title">
                        <h5>Fundamental & Technical Outlook</h5>
                    </div>
                </div>
                <div class="card-body">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="home-tab" data-toggle="tab" data-target="#home"
                                type="button" role="tab" aria-controls="home" aria-selected="true">Track all
                                markets</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="profile-tab" data-toggle="tab" data-target="#profile"
                                type="button" role="tab" aria-controls="profile" aria-selected="false">Personal
                                trading chart</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel"
                            aria-labelledby="home-tab">
                            <!-- TradingView Widget BEGIN -->
                            <div class="tradingview-widget-container">
                                <div class="tradingview-widget-container__widget"></div>
                                <div class="tradingview-widget-copyright"><a href="https://www.tradingview.com/"
                                        rel="noopener nofollow" target="_blank"><span class="blue-text">Track all markets
                                            on
                                            TradingView</span></a></div>
                                <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-forex-cross-rates.js"
                                    async>
                                    {
                                        "width": "100%",
                                        "height": "550",
                                        "currencies": [
                                            "EUR",
                                            "USD",
                                            "JPY",
                                            "GBP",
                                            "CHF",
                                            "AUD",
                                            "CAD",
                                            "NZD",
                                            "CNY",
                                            "TRY",
                                            "SEK",
                                            "NOK"
                                        ],
                                        "isTransparent": true,
                                        "colorTheme": "light",
                                        "locale": "en"
                                    }
                                </script>
                            </div>
                            <!-- TradingView Widget END -->
                        </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <div class="tradingview-widget-container">
                                <div id="tradingview_f933e"></div>
                                <div class="tradingview-widget-copyright">

                                    <script type="text/javascript" src="https://s3.tradingview.com/tv.js"></script>
                                    <script type="text/javascript">
                                        new TradingView.widget({
                                            "width": "100%",
                                            "height": "550",
                                            "symbol": "COINBASE:BTCUSD",
                                            "interval": "1",
                                            "timezone": "Etc/UTC",
                                            "theme": 'light',
                                            "style": "9",
                                            "locale": "en",
                                            "toolbar_bg": "#f1f3f6",
                                            "enable_publishing": false,
                                            "hide_side_toolbar": false,
                                            "allow_symbol_change": true,
                                            "calendar": false,
                                            "studies": [
                                                "BB@tv-basicstudies"
                                            ],
                                            "container_id": "tradingview_f933e"
                                        });
                                    </script>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php if($mod['investment']): ?>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title fw-mediumbold">
                            <h5 class="text-primary h5">Active Plan(s)</h5>
                        </div>
                        <div class="card-list">
                            <?php $__empty_1 = true; $__currentLoopData = $plans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $plan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <a href="<?php echo e(route('plandetails', ['id' => $plan->id])); ?>">
                                    <div class="item-list shadow-sm d-flex">
                                        <div class="info-user ml-3 text-decoration-none">
                                            <div class="username font-weight-bolder"><?php echo e($plan->dplan->name); ?></div>
                                            <div class="status">
                                                <?php echo e($settings->currency); ?><?php echo e(number_format($plan->amount)); ?></div>
                                        </div>
                                        <div>
                                            <i class="fa fa-arrow-right"></i>
                                        </div>
                                    </div>
                                </a>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <div class="text-center">
                                    <p>You do not have an active investment plan at the moment.</p>
                                    <a href="<?php echo e(route('mplans')); ?>" class="px-3 btn btn-primary">Buy a
                                        plan</a>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>

    <div class="mt-4 row">
        <div class="col-12">
            <div class="nk-block-head-content">
                <h6 class="text-primary h5">
                    Recent transactions <span class="text-base count">(<?php echo e(count($t_history)); ?>)</span>
                </h6>
            </div>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="mb-2 text-right">
                        <a href="<?php echo e(route('accounthistory')); ?>"> <i class="fas fa-clipboard"></i>
                            View all transactions
                        </a>
                    </div>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr class="bg-light">
                                    <th>Date</th>
                                    <th>Type</th>
                                    <th>Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__empty_1 = true; $__currentLoopData = $t_history; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <tr>
                                        <td>
                                            <?php echo e($item->created_at->toDayDateTimeString()); ?>

                                        </td>
                                        <td>
                                            <?php echo e($item->type); ?>

                                        </td>
                                        <td>
                                            <span class="badge badge-secondary">
                                                <?php echo e($settings->currency); ?><?php echo e(number_format($item->amount)); ?></span>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <td colspan="3">
                                        No record yet
                                    </td>
                                <?php endif; ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
    

    <div class="mt-4 row" x-data="{
        address: '<?php echo e(Auth::user()->ref_link); ?>',
        copyToClipboard(text) {
            if (!navigator.clipboard) {
                return alert('Copying to clipboard only works on secure sites viewed through a modern browser.')
            }
            navigator.clipboard.writeText(text)
                .then(() => {
                    alert('Copied');
                })
        },
    }">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="text-black">Refer Us & Earn</h5>
                    <p>Use the below link to invite your friends.</p>
                    <div class="mb-3 input-group">
                        <input type="text" class="form-control myInput readonly" value="<?php echo e(Auth::user()->ref_link); ?>"
                            id="key-02" readonly>
                        <div class="input-group-append">
                            <button class="btn btn-outline-primary" x-on:click="copyToClipboard(address)"
                                data-clipboard-target="#key-02" type="button">
                                <i class="fas fa-copy"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.millage', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/macbookair/Documents/Brynamics/OnlineTrader/onlinetrade/resources/views/millage/user/dashboard.blade.php ENDPATH**/ ?>