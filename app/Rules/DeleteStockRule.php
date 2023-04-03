<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class DeleteStockRule implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */

    private $stock;
    private $option;

    public function __construct($stock, $option)
    {
        $this->stock = $stock;
        $this->option = $option;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        if($this->option == 'delete'){
            return $value <= $this->stock;
        }else{
            return true;
        }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Las piezas tomadas no pueden ser mayores a las piezas en stock real.';
    }
}
