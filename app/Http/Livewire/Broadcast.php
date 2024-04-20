<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Cache;
use Livewire\Component;

class Broadcast extends Component
{
    public function render()
    {
        $key = 'broadcast_';
        $event = Cache::get($key);
        if ($event) {
            Cache::forget($key);
            $this->emit('broadcast', $event); // for livewire 2
        }
        return view('livewire.broadcast');
    }
}
