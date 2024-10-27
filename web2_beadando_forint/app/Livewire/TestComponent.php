<?php

namespace App\Livewire;

use Livewire\Component;

class TestComponent extends Component
{
    public $message = 'Hello Livewire!';

    public function updateMessage()
    {
        $this->message = 'Az üzenet frissítve lett!';
    }
    public function render()
    {
        return view('livewire.test-component');
    }
}
