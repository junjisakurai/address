<?php 
function connection_db() {
	try {

	/*$ dsn = 'mysql: dbname = test_db form; host = localhost; charset = utf 8'; 
	                                  $ user = 'root'; $ password = ''; $ dbh = new PDO($ dsn, $ user, $ password);*/

	    /* リクエストから得たスーパーグローバル変数をチェックするなどの処理 */

	    // データベースに接続
	    $pdo = new PDO(
	        'mysql:dbname=test_db;host=localhost;charset=utf8mb4',
	        'root',
	        '',
	        [//オプション
	            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,   //エラーの際、エラーをスローしてくれる
	            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,   //カラム名をキーとする連想配列で取得する．これが一番ポピュラーな設定
	        ]
	    );
	    
	} catch (PDOException $e) {

	    // エラーが発生した場合は「500 Internal Server Error」でテキストとして表示して終了する
	    // - もし手抜きしたくない場合は普通にHTMLの表示を継続する
	    // - ここではエラー内容を表示しているが， 実際の商用環境ではログファイルに記録して， Webブラウザには出さないほうが望ましい
	    header('Content-Type: text/plain; charset=UTF-8', true, 500);
	    exit($e->getMessage()); 

	}
   return $pdo;
}
?>