<?php

namespace App\View\Components\Forms;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Form extends Component
{
    public function __construct(
        public string $action,
        public string $buttonLabel,
        public string $method,
    ) {}

    public function render(): View|Closure|string
    {
        return view('components.forms.form');
    }
}
