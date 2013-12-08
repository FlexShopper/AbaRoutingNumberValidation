<?php
namespace FlexShopper\Validator;

use Zend\Validator\AbstractValidator;
use Zend\Validator\Exception;

class RoutingNumber extends AbstractValidator
{
    const INVALID_CHECK_DIGIT = 'invalid-check-digit';
    const NUMBER_TOO_SHORT = 'short-number';
    const NOT_NUMBER = 'not-number';

    protected $messageTemplates = array(
        self::NOT_NUMBER => 'Not a number',
        self::INVALID_CHECK_DIGIT => "Invalid check digit",
        self::NUMBER_TOO_SHORT => 'Routing number too short'
    );

    /**
     * Returns true if and only if $value meets the validation requirements
     *
     * If $value fails validation, then this method returns false, and
     * getMessages() will return an array of messages that explain why the
     * validation failed.
     *
     * @param  mixed $value
     * @return bool
     * @throws Exception\RuntimeException If validation of $value is impossible
     */
    public function isValid($value)
    {
        if (!is_numeric($value)) {
            $this->error(self::NOT_NUMBER);
            return false;
        }

        $digits = array_map('intval', str_split((string)$value));
        if (count($digits) !== 9) {
            $this->error(self::NUMBER_TOO_SHORT);
            return false;
        }

        $runningTotal = (
            (($digits[0] + $digits[3] + $digits[6]) * 7) +
            (($digits[1] + $digits[4] + $digits[7]) * 3) +
            (($digits[2] + $digits[5]) * 9)
        );

        $calculatedCheckDigit = $runningTotal % (strlen($runningTotal) * 10);
        $checkDigitVerification = $calculatedCheckDigit == end($digits);
        $modCheck = ((($calculatedCheckDigit * 9) + $runningTotal) % 10) == 0;

        if (!$checkDigitVerification && !$modCheck) {
            $this->error(self::INVALID_CHECK_DIGIT);
            return false;
        }

        return true;
    }
}
