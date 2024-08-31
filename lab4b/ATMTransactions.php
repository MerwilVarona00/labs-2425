<?php

class ATMTransactions {
    private $transactionId;
    private $date;
    private $type;
    private $amount;
    private $postBalance;

    public function modifies() {
        return false;
    }
}

?>
