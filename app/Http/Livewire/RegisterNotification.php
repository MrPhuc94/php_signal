<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Cache;
use Livewire\Component;

class RegisterNotification extends Component
{
    public $user;

    public function getListeners(): array
    {
        return [
            'broadcast' => 'broadcast',
        ];
    }

    public function broadcast(array $event): void
    {
        // dump($event['data']);
        $this->user = $event['data'];
    }

    public function render()
    {
        return view('livewire.register-notification');
    }
}
