<?php

require_once 'CreditForm.class.php';
require_once 'CreditResult.class.php';
require_once $conf->root_path.'/lib/Messages.class.php';

class CreditCtrl {

    private $form;    
    private $result; 
    private $msgs;     
    private $conf;     
    private $smarty;   

    public function __construct() {
        $this->form = new CreditForm();
        $this->result = new CreditResult();
        $this->msgs = new Messages();   

        global $conf;
        $this->conf = $conf;

        global $smarty;
        $this->smarty = $smarty;
    }

    public function getParams(){
        $this->form->amount  = $_REQUEST['amount'] ?? null;
        $this->form->years   = $_REQUEST['years'] ?? null;
        $this->form->percent = $_REQUEST['percent'] ?? null;
    }

    public function validate() {
        if ($this->form->amount === null || $this->form->years === null || $this->form->percent === null) {
            return false;
        }

        if ($this->form->amount == '') $this->msgs->addError('Nie podano kwoty kredytu');
        if ($this->form->years == '') $this->msgs->addError('Nie podano liczby lat');
        if ($this->form->percent == '') $this->msgs->addError('Nie podano oprocentowania');

        if ($this->msgs->isError()) return false;

        if (!is_numeric($this->form->amount)) $this->msgs->addError('Kwota musi być liczbą');
        if (!is_numeric($this->form->years)) $this->msgs->addError('Lata muszą być liczbą');
        if (!is_numeric($this->form->percent)) $this->msgs->addError('Oprocentowanie musi być liczbą');

        if ($this->msgs->isError()) return false;

        return true;
    }

    public function process() {
        $this->getParams();

        if ($this->validate()) {
            $amount  = floatval($this->form->amount);
            $years   = floatval($this->form->years);
            $percent = floatval($this->form->percent);

            $months = $years * 12;
            $rate = ($percent / 100) / 12;

            if ($rate == 0) {
                $this->result->monthly = round($amount / $months, 2);
            } else {
                $this->result->monthly = round(
                    ($amount * $rate) / (1 - pow(1 + $rate, -$months)), 
                    2
                );
            }

            $this->result->cost = round($this->result->monthly * $months, 2);
            $this->msgs->addInfo('Obliczenia wykonano prawidłowo.');
        }

        $this->generateView();
    }

    public function generateView() {
        $this->smarty->assign('form', $this->form);
        $this->smarty->assign('res', $this->result);
        $this->smarty->assign('msgs', $this->msgs);
        $this->smarty->assign('page_title', 'Kalkulator kredytowy');

        $this->smarty->display('CreditView.html');  
    }
}
