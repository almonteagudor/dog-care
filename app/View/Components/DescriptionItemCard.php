<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class DescriptionItemCard extends Component
{
    public function __construct(
        public string $name,
        public string $description,
        public ?string $category = null,
        public ?string $createdAt = null,
        public string $editUrl = '',
        public string $deleteUrl = '',

    ) {}

    public function render(): View|Closure|string
    {
        return view('components.description-item-card');
    }
}
