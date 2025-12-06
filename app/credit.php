<?php

require_once dirname(__FILE__).'/../config.php';
require_once $conf->root_path.'/app/CreditCtrl.class.php';

$ctrl = new CreditCtrl();
$ctrl->process();
