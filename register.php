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
    
    // 注册接口

    
    $account = $_POST['account'];
    $pwd = $_POST['pwd'];
    // 查找数据库是否注册过
    $result = $mysqli->query("SELECT * FROM t_user WHERE account="."'$account'");
    $rs = $result->fetch_row();
    if ($rs!=null){
      $arr = array('status' => 0, 'msg' => '用户已存在');
      echo json_encode($arr);
    }
    else{
      $sql = "INSERT INTO t_user (account,password) VALUES ('$account', '$pwd')";
      $rs = $mysqli->query($sql);
      if (!$rs) {
        $arr = array('status' => 2, 'msg' => '注册失败');//插入失败
        echo json_encode($arr);
      }
      else {
        $arr = array('status' => 1, 'msg' => '注册成功');//插入成功
        echo json_encode($arr);
      }
    }
    // 注册接口
?>










