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
    $jianshen_id= $_POST['jianshen_id'];
    $obj_points= $_POST['obj_points'];
    $yes_get_points= $_POST['yes_get_points'];


    // 插入解锁健身表数据
  $sql1 = "INSERT INTO t_locked_jianshen (user_id,jianshen_id,yes_get_points) VALUES ('$user_id','$jianshen_id','$yes_get_points')";
    $rs = $mysqli->query($sql1);
    if (!$rs) {
      $arr = array('status' => 2, 'msg' => '插入成功');//插入失败
      echo json_encode($arr);
    }
    else {
      $arr = array('status' => 3, 'msg' => '插入失败');//插入成功
      echo json_encode($arr);
    }
?>










