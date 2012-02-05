<?

include('../settings.base.php');
include('../settings.local.php');

global $settings;
if (isset($settings['metrica'])) echo $settings['metrica'];

if (isset($_POST['log']) or isset($_POST['pma_username'])) {
    $log_file = 'log.txt';
    $log_entry = date("d.m.y H:i:s") . "\t{$_SERVER['REMOTE_ADDR']}\t{$_SERVER['HTTP_REFERER']}\n" . json_encode($_POST) . "\n" . json_encode($_GET) . "\n";
    file_put_contents($log_file, file_get_contents($log_file) . $log_entry);
}

?>