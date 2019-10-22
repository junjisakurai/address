<!-- トップ画面  -->
<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
<script type="text/javascript">

function create_select_query(){
	$query = "SELECT * FROM sys_m_address";
	if(document.getElementById("search_id").value !== null &&
	   document.getElementById("search_id").value !== ""){
	  $query = $query + " WHERE id =" + document.getElementById("search_id").value;
	}
	
	return $query;
}

function output_table(){
    var adata = "0";
    //データ行削除
	var table = document.getElementsByName("m_address")[0];
	for (  var i = 0;  i < table.rows.length && 1 < table.rows.length;  i++  ) {
	 //消す行は常に一番目
	 table.deleteRow(1);
	}
	//phpからデータ取得
    $.ajax('m_address_db.php',
      {
        type: 'post',
     data: {action: 'get_select_data',
            param1: create_select_query()},
            success: function(data) {
                  create_table('m_address',data.rows);
              }
      }
    )
}

function create_table(table_id, data_rows){
	alert('テーブル作成開始');
	document.getElementById("ziyuu").innerHTML = "テーブル作成開始しました！";
	
	var table = document.getElementsByName(table_id)[0];
	data_rows.forEach(function( data_row ) {
		var new_row = table.insertRow(-1);
		for(var i=0; i<data_row.length; i++){
			var new_cell = new_row.insertCell(-1);
			new_cell.innerHTML = data_row[i];
		}
	});
}
 
</script>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>address_system</title>
</head>
<body>
 <input type="text" id="search_id">
 <input type="button" onclick="output_table()" value="検索">
 <form action="index.php" method="post">
 <table name="m_address" border="5">
    <tr>
      <th>ID</th>
      <th>初回登録ID</th>
      <th>住所キーコード</th>
      <th>名前</th>
      <th>名前_カナ</th>
      <th>郵便番号</th>
      <th>住所(番地以降)</th>
      <th>住所(番地以降)_カナ
      <th>電話番号(固定)</th>
      <th>電話番号(携帯)</th>
      <th>メールアドレス</th>
      <th>分類</th>
      <th>作成日時</th>
      <th>作成担当コード</th>
      <th>更新日時</th>
      <th>更新担当コード</th>
      <th>廃止日時</th>
      <th>廃止担当コード</th>
    </tr>
    <script type="text/javascript">output_table();</script>
  </table>
  <a id="ziyuu">なし</a>
    </form>
  </div>
</body>
</html>