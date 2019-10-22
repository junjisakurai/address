<?php 
function get_db_data($query) {
    include('db_conn.php');
    $pdo = connection_db();
	//DB取得
	$rows = $pdo->query($query);

	// Webブラウザにこれから表示するものがUTF-8で書かれたHTMLであることを伝える
	// (これか <meta charset="utf-8"> の最低限どちらか1つがあればいい． 両方あっても良い．)
	header('Content-Type: text/html; charset=utf-8');

    return $rows;
}
?>