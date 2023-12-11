<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Input extends Component
{
    public $placeholder;
    public $icon;
    public $type;
    public $name;
    public $value;
    public $label;
    public $mbtm;
    public $rounded;
    public function __construct($icon,$type,$name,$value="",$label="",$mbtm="mb-10",$rounded="rounded-lg",$placeholder="")
    {
        $this->placeholder = $placeholder;
        $this->icon = $icon;
        $this->type = $type;
        $this->name = $name;
        $this->value = $value;
        $this->label = $label;
        $this->mbtm = $mbtm;
        $this->rounded = $rounded;
    }
    
    public function render(): View|Closure|string
    {
        return view('components.input');
    }
}
