<?php

function printr($m){
	echo '<pre>';
	print_r($m);
	echo '</pre>';
}

function logError($array){
	if( ! TRACK) return;
	if( ! is_dir(TRACK_DIR)) mkdir(TRACK_DIR, 0777);
	$handle = fopen(TRACK_DIR . '/' . TRACK_FILE_NAME, 'a');
	flock($handle, LOCK_EX);
	fputs($handle, serialize($array) . "\n");
	flock($handle, LOCK_UN);
	fclose($handle);
}