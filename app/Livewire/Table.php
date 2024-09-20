<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;

abstract class Table extends Component
{
    use WithPagination;

    public $perPage = 5;

    public $page = 1;

    public function render()
    {
        return view('livewire.table');
    }

    public abstract function query();

    public abstract function columns():array;

    public function data()
    {
        return $this
            ->query()
            ->paginate($this->perPage);
    }


}
