<?php

namespace Laravel\Pulse\Http\Livewire;

use Laravel\Pulse\Pulse;
use Livewire\Component;

class Servers extends Component
{
    public function render(Pulse $pulse)
    {
        $servers = $pulse->servers()->toArray();

        if (request()->hasHeader('X-Livewire')) {
            $this->emit('chartUpdate', $servers);

            return view('pulse::livewire.servers', [
                'servers' => $servers,
            ]);
        }

        return view('pulse::livewire.servers', [
            'servers' => $servers,
        ]);
    }
}