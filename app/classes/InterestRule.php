<?php
/**
 * @author Benjamin Bergeron
 */
class InterestRule {
    public $month = 0;
    public $interestRate = 0;

    public function __construct(int $month, float $interestRate)    
    {    
        $this->month = $month;
        $this->interestRate = $interestRate;
    }

    public function __toString()
    {
        // not suitable for i18n
        return $this->month . " mois - " . ($this->interestRate * 100) . "%";
    }
}
?>