<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class quack extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $id,
        public string $titulo,
        public string $mensaje,
        public string $img,
        public string $detalles,
        public string $comentarios,
        public string $user,
        public string $name
    ){}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.quack');
    }
}
