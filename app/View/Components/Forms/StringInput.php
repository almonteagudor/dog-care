<?php

namespace App\View\Components\Forms;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class StringInput extends Component
{
    public function __construct(
        public string $id,
        public string $label,
        public string $name,
        public string $placeholder,
        public ?string $value,
    ) {}

    public function render(): View|Closure|string
    {
        return view('components.forms.string-input');
    }
}
