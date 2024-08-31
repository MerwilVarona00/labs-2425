<?php

class ATM {
    private $location;
    private $managedBy;

    public function identifies() {
        return false;
    }

    public function transactions() {
        return false;
    }
}

?>