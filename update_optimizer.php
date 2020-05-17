<?php
//if(empty($_GET['key']) || $_GET['key'] != 'YOUR_KEY_HERE')
//	return;

$zipdir = './';
$sevenzip = PHP_OS == 'WINNT' ? '7z1900-extra\\7za.exe' : 'p7zip_16.02/bin/7za';

echo 'LC Update Optimizer (<a href="https://github.com/Karmel0x/lastchaos-some-usefull-staff">https://github.com/Karmel0x/lastchaos-some-usefull-staff</a>)<br><br>';

if(!file_exists($sevenzip)){
	echo 'You need 7z to use this tool<br>';
	echo '<br>Windows:<br>';
	echo 'Go to '.__DIR__.'<br>';
	echo 'Download <a href="https://www.7-zip.org/a/7z1900-extra.7z">7z1900-extra</a><br>';
	echo 'Extract to 7z1900-extra/<br>';
	
	echo '<br>Linux:<br>';
	echo 'cd '.__DIR__.'<br>';
	echo 'wget https://netix.dl.sourceforge.net/project/p7zip/p7zip/16.02/p7zip_16.02_x86_linux_bin.tar.bz2<br>';
	echo 'tar -xf p7zip_16.02_x86_linux_bin.tar.bz2<br>';
	return;
}

echo 'Removing duplicates:<br>';
echo '<textarea style="width: 400px;height: 500px;" autocomplete="off">';
$files_amount = 0;
$files_size = 0;
$files_all = array();
$scandir = scandir($zipdir);//, SCANDIR_SORT_DESCENDING
rsort($scandir, SORT_NUMERIC);
foreach($scandir as $scandir_val){
	list($nam, $ext) = explode('.', $scandir_val.'.');
	if(!is_numeric($nam) || $ext != 'zip')
		continue;
	
	echo 'Update: '.$scandir_val."\n";
	$output_list = array();
	exec($sevenzip.' l -ba '.$zipdir.$scandir_val, $output_list);
	
	$files_dup = array();
	foreach($output_list as $output_list_val){
		//echo "FILE: ".$scandir_val." - ".$output_list_val."\n";
		$output_list_val_explode = explode(' ', $output_list_val, 5);
		
		if($output_list_val_explode[2] == 'D....')
			continue;
		
		$filename = substr($output_list_val, 53);
		if($filename == 'update.txt')
			continue;
		if(!in_array($filename, $files_all)){
			$files_all[] = $filename;
			continue;
		}

		$files_amount++;
		$files_dup[] = $filename;
		echo $filename."\n";
	}
	$file_size = filesize($zipdir.$scandir_val);
	if(!empty($files_dup))
		echo 'Packing: '.exec($sevenzip.' d '.$zipdir.$scandir_val.' "'.implode('" "', $files_dup).'"')."\n";
	
	clearstatcache();
	$files_size += $file_size - filesize($zipdir.$scandir_val);
	echo "----------\n";
}

echo '</textarea><br>';
echo 'Deleted '.$files_amount.' files ('.number_format(($files_size / 1024 / 1024), 2).' MB)<br>';
