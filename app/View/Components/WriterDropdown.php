<?php

namespace App\View\Components;

use App\Models\Writer;
use Illuminate\View\Component;

class WriterDropdown extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.writer-dropdown', [
            'writers' => Writer::all(),
            'currentWriter' => Writer::firstWhere('slug', request('writer'))
        ]);
    }
}
