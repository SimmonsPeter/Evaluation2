<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ItemForm extends Component
{
    /**
     * Create a new component instance.
     */
    public $item;
    public $buttonText;
    public function __construct($item = null, $buttonText)
    {
        $this->item = $item;
        $this->buttonText = $buttonText;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.item-form');
    }
}
