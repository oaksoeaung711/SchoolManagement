<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class KBTCMail implements ValidationRule
{
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if(explode("@",$value)[1] !== "kbtc.edu.mm"){
            $fail("Only kbtc.edu.mm mail is allowed.");
        }
    }
}
