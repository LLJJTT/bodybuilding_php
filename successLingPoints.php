<?php
    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
    header('Access-Control-Allow-Methods: GET, POST, PUT,DELETE');
    // 连接数据库名称
    $mysql_conf = array(
        'host'    => '127.0.0.1', 
        'db'      => 'bodybuilding', 
        'db_user' => 'root', 
        'db_pwd'  => '', 
        );
    $mysqli = @new mysqli($mysql_conf['host'], $mysql_conf['db_user'], $mysql_conf['db_pwd']);
    //诊断连接错误
    if ($mysqli->connect_errno) {
        die("could not connect to the database:\n" . $mysqli->connect_error);
    }
    $mysqli->query("set names 'utf8';");
    //连接数据库
    $select_db = $mysqli->select_db($mysql_conf['db']);
    if (!$select_db) {
        die("could not connect to the db:\n" .  $mysqli->error);
    }
    
   // 完成项目时间之后，领取对应积分接口

    $user_id = $_POST['user_id'];
    $obj_points= $_POST['obj_points'];
    $jianshen_id= $_POST['jianshen_id'];
    $yes_get_points= $_POST['yes_get_points'];


    // 更新积分
    $sql = "UPDATE  t_user SET points=points+$obj_points WHERE id='$user_id'";
    $result = $mysqli->query($sql);
    if ($result) {
      $arr = array('status' => 1, 'msg' => '插入成功');//插入成功
      echo json_encode($arr);
    }
    else {
      $arr = array('status' => 0, 'msg' => '插入失败');//插入失败
      echo json_encode($arr);
    }
    $sql1 = "UPDATE  t_jianshen SET locked_number=locked_number+1 WHERE id='$jianshen_id'";
    $result1 = $mysqli->query($sql1);
?>










