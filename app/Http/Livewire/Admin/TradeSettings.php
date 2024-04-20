<?php

namespace App\Http\Livewire\Admin;

use App\Models\Settings;
use App\Traits\PingServer;
use Livewire\Component;

class TradeSettings extends Component
{
    public $subType;
    public $monthlyFee;
    public $quarterlyFee;
    public $yearlyFee;
    public $percent;
    public $subInfo;
    public $conectionFee;
    public $commissionType;
    public $period;
    public $status;
    public $iblink;
    public $use_my_metaapi_account = false;
    public $meta_api_token;

    use PingServer;

    public function mount()
    {
        $response = $this->fetctApi('/account-profile');

        if ($response->successful()) {
            $profile = $response['data'];
            $this->use_my_metaapi_account = boolval($profile['use_my_metaapi_account']);
            $this->meta_api_token = $profile['meta_api_token'];
        } else {
            session()->flash('message', $response['message']);
        }

        $settings = Settings::find(1);

        if ($settings->subscription_type != null) {
            $this->subType = $settings->subscription_type;
        } else {
            $this->subType = 'Fixed';
        }

        $this->monthlyFee = $settings->monthlyfee;
        $this->quarterlyFee = $settings->quarterlyfee;
        $this->yearlyFee = $settings->yearlyfee;
        $this->conectionFee = $settings->connection_fee;
        $this->subInfo = $this->subText($this->subType);
        $this->iblink = $settings->ib_link;
    }

    public function render()
    {
        return view('livewire.admin.trade-settings');
    }

    public function changeSubType(string $val): void
    {
        $settings = Settings::find(1);
        $this->subType = $val;
        $this->subInfo = $this->subText($val);
        if ($this->subType == 'Percentage' && $settings->subscription_type == 'Fixed') {
            $settings->subscription_type = $this->subType;
            $settings->save();
            $this->saveSettingsInServer();
        }
    }

    public function subText(string $text): string
    {
        if ($text == 'Fixed') {
            return 'When you select this option, users will be charged a fixed amount of money every month, quarter or year.';
        }

        return 'When you select this option, users will be charged a commission of their trading account within the period you set on your master accounts.';
    }

    public function saveFixed(): void
    {
        $settings = Settings::find(1);
        $settings->subscription_type = $this->subType;
        $settings->monthlyfee = $this->monthlyFee;
        $settings->quarterlyfee = $this->quarterlyFee;
        $settings->yearlyfee = $this->yearlyFee;
        $settings->meta_api_key = $this->meta_api_token;
        $settings->save();
        $this->subType = 'Fixed';

        $this->fetctApi('/update-profile', [
            'use_my_metaapi_account' => $this->use_my_metaapi_account,
            'meta_api_token' => $this->meta_api_token,
        ], 'POST');
        // $this->saveSettingsInServer();
        session()->flash('success', 'Settings saved successfully');
    }

    public function saveSettingsInServer(): void
    {
        $this->fetctApi('/update-charge', [
            'amount_to_deduct' => 0,
            'subscription_type' => $this->subType,
            'deduct_on' => 'monthly',
            'through' => 'api'
        ], 'PUT');
    }

    public function updatedConectionFee(): void
    {
        $settings = Settings::select('id', 'connection_fee', 'updated_at')->find(1);

        $this->validate([
            'conectionFee' => ['required'],
        ]);

        $settings->connection_fee = $this->conectionFee;
        $settings->save();
        session()->flash('status', 'Saved');
    }

    public function saveIbLink()
    {
        $settings = Settings::select('id', 'ib_link', 'updated_at')->find(1);

        $this->validate([
            'iblink' => ['required'],
        ]);

        $settings->ib_link = $this->iblink;
        $settings->save();
        session()->flash('success', 'Saved');
    }
}
