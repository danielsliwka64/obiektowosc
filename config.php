<?php
require_once dirname(__FILE__).'/lib/smarty/Smarty.class.php';

$conf = new stdClass();
$conf->root_path = dirname(__FILE__);
$conf->server_url = 'http://localhost';
$conf->app_root = '/obiektowosc';
$conf->app_url = $conf->server_url . $conf->app_root;

$smarty = new Smarty();
$smarty->assign('conf', $conf);
$smarty->setTemplateDir($conf->root_path.'/templates');
$smarty->setCompileDir($conf->root_path.'/templates_c');