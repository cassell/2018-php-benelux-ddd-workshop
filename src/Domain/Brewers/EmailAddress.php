<?php

namespace Beeriously\Domain\Brewers;

use Beeriously\Domain\Generic\ValueObject\String\NotEmptyStringValue;

class EmailAddress extends NotEmptyStringValue
{
    public function __construct(string $value)
    {
        if (! filter_var($value, FILTER_VALIDATE_EMAIL)) {
            throw new \InvalidArgumentException("Invalid email address");
        }
        parent::__construct($value);
    }

}