<?php
error_reporting(E_ALL | E_STRICT);
while (true) {
	$socket = socket_create(AF_INET, SOCK_DGRAM, SOL_UDP);
	socket_bind($socket, 'XX.XX.XX.XX', 1700); //eigene IP Adresse an die die Pakete zugestellt werden hier eintragen

	$from = '';
	$port = 0;
	socket_recvfrom($socket, $buf, 8192, 0, $from, $port);
	if($buf!=str_replace("rxpk","",$buf))
	{
		$buf = explode('vc', $buf);
		$json = json_decode($buf[1]);
		$chan = $json->rxpk[0]->chan;
		$freq = $json->rxpk[0]->freq;
		$datr = $json->rxpk[0]->datr;
		$codr = $json->rxpk[0]->codr;
		$rssi = $json->rxpk[0]->rssi;
		$size = $json->rxpk[0]->size;
		}
}
?>
