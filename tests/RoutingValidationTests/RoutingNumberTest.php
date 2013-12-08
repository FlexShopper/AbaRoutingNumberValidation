<?php

class RoutingNumberTest extends PHPUnit_Framework_TestCase {

    /**
     * Taken from BofA
     *
     * @var array
     */
    protected $_routingNumbers = [
        '051000017', // AL
        '051000017', // AK
        '122101706', // AZ
        '082000073', // AR
        '121000358', // CA
        '121000358', // CA
        '051000017', // CO
        '011900254', // CN
        '031202084', // DE
        '054001204', // DC
        '063100277', // FL
        '063100277', // FL
        '061000052', // GA
        '051000017', // HI,
        '123103716', // ID
        '081904808', // IL
        '081904808', // IL
        '051000017', // IN
        '081904808', // IN
        '071214579', // IN
        '073000176', // IO
        '101100045', // KA
        '051000017', // KC
        '051000017', // LA
        '011200365', // ME
        '052001633', // MD
        '011000138', // MA
        '051000017', // MI
        '081904808', // MI
        '072000805', // MI
        '051000017', // MN
        '051000017', // MS
        '081000032', // MO
        '081000032', // MO
        '051000017', // MT
        '051000017', // NE
        '011400495', // NH
        '021200339', // NJ
        '107000327', // NM
        '021000322', // NY
        '053000196', // NC
        '051000017', // ND
        '051000017', // OH
        '103000017', // OK
        '323070380', // OR
        '031202084', // PN
        '011500010', // RI
        '053904483', // SC
        '051000017', // SD
        '064000020', // TN
        '111000025', // TX
        '111000025', // TX
        '051000017', // UT
        '051000017', // VE
        '051000017', // VA
        '125000024', // WA
        '051000017', // WV
        '051000017', // WI
        '051000017', // WY
    ];

    public function testIsValid()
    {
        $routingNumberValidator = new \FlexShopper\Validator\RoutingNumber();
        foreach ($this->_routingNumbers as $routingNumber) {
            $this->assertTrue($routingNumberValidator->isValid($routingNumber));
        }
    }
}


