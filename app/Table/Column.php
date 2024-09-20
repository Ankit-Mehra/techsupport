<?php

namespace App\Table;
use Illuminate\Support\Str;
class Column
{
    public string $component = 'columns.column';

    public string $label;

    public string $key;

    public ?int $limit = null;


    public function __construct(string $label, string $key)
    {
        $this->label = $label;
        $this->key = $key;
    }

    public static function make($key, $label)
    {
        return new static($key, $label);
    }

    public function component(string $component)
    {
        $this->component = $component;

        return $this;
    }

    public function limit(int $limit)
    {
        $this->limit = $limit;
        return $this;
    }

    public function getValue($row)
    {
        $value = data_get($row, $this->key);

        if ($this->limit !== null) {
            return Str::limit($value, $this->limit);
        }

        return $value ?? 'N/A';
    }

}
