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
    
   // 修改个人信息接口

    $user_id = $_POST['user_id'];
    $nick_name = $_POST['nick_name'];
    $height = $_POST['height'];
    $weight = $_POST['weight'];
    $age = $_POST['age'];
    $sex = $_POST['sex'];

    
    // 修改信息之后更新数据库信息
    $sql = "UPDATE  t_user SET nick_name='$nick_name',height='$height',weight='$weight',age='$age',sex='$sex'  WHERE id='$user_id'";
    $result = $mysqli->query($sql);
    if ($result) {
      $arr = array('status' => 1, 'msg' => '修改成功');//插入成功
      echo json_encode($arr);
    }
    else {
      $arr = array('status' => 0, 'msg' => '修改失败');//插入失败
      echo json_encode($arr);
    }
?>










