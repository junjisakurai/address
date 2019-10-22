<?php
function get_select_data($query){
             $return_rows = array();
             include('db_go.php');
             $rows = get_db_data($query);
             //連想配列を二次元配列に変換
             foreach($rows as $row){
             	$new_row = array($row['id'],
								$row['first_id'],
								$row['address_key_cd'],
								$row['name'],
								$row['name_k'],
								$row['zip_address'],
								$row['under_address'],
								$row['under_address_k'],
								$row['tel_fixed'],
								$row['tel_mobile'],
								$row['mail_address'],
								$row['division'],
								$row['create_date'],
								$row['create_op_cd'],
								$row['update_date'],
								$row['update_op_cd'],
								$row['abolish_date'],
								$row['abolish_op_cd']);
				array_push($return_rows,$new_row);
				$new_row = NULL;
				$rows = null;
			}
				return $return_rows;
}

	$new_rows = array();
	$param1 = $_POST['param1'];
	if(isset($_POST['action']) && !empty($_POST['action'])) {
	    $action = $_POST['action'];
	    //関数名毎に振分
	    switch($action) {
	        case 'get_select_data' :
	         $new_rows = get_select_data($param1);
	         break;
	    }
	}


	//戻り値格納
	$data = array();
	$data["message"] = $action."|通信できたよ|".$param1;
	$data["rows"] = $new_rows;
	header('Content-Type: application/json; charset=utf-8');
	echo json_encode($data);
	$data = NULL;
	$new_rows = NULL;
	$rows = NULL;
?>