<?php

namespace App\Traits;

use Illuminate\Support\Str;

trait HasClassicSet
{
    /**
     * Determine if a classic set method exists for an attribute.
     *
     * @param  string  $key
     * @return bool
     */
    public function hasSetMutator($key)
    {
        return method_exists($this, 'set'.Str::studly($key));
    }

    /**
     * Set the value of an attribute using its classic set.
     *
     * @param  string  $key
     * @param  mixed  $value
     * @return mixed
     */
    protected function setMutatedAttributeValue($key, $value)
    {
        return $this->{'set'.Str::studly($key)}($value);
    }
}
