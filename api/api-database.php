<?php
$dsn  = 'mysql:host=127.0.0.1;dbname=api_666';//dbname=数据库名,如果使用Mysql以外的数据库请注意此段
$user = 'bxy';//数据库用户名
$pwd  = 'bxy';//数据库用户密码

try{
    $pdo = new PDO($dsn,$user,$pwd);
}catch(PDOException $e){
    echo '数据库连接失败：'.$e -> getMessage();
}
    
function Initialization_Table(){
    try{
        global $pdo;
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "CREATE TABLE IF NOT EXISTS Url(url VARCHAR(255))";
        $pdo -> exec($sql);
        $sql = "CREATE TABLE IF NOT EXISTS Site(site VARCHAR(255),count INT(11))";
        $pdo -> exec($sql);
    }catch(PDOException $e)
    {
            return $sql . "<br>" . $e->getMessage();
    }
}
function Query_Url_in_url($x){
    try{
	global $pdo;
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$sql  = 'SELECT url FROM Url WHERE url='.'"'.$x.'"';
	$res  = $pdo -> query($sql);
	$data = $res -> fetchAll(PDO::FETCH_ASSOC);
	if ($data != null){
		return true;
	}else{
		return false;
	}
    }catch(PDOException $e)
    {
	    return $sql . "<br>" . $e->getMessage();
    }
}
function Add_url_to_Url($x){
    try{
        global $pdo;
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$sql = 'INSERT INTO Url(url) VALUES('.'"'.$x.'"'.')';
	$pdo -> exec($sql);
    }catch(PDOException $e)
    {
            return $sql . "<br>" . $e->getMessage();
    }
}
function Add_count_of_the_site_to_the_Site($x){
    try{
        global $pdo;
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$sql  = 'SELECT count FROM Site WHERE site='.'"'.$x.'"';
	$res  = $pdo -> query($sql);
	$data = $res -> fetchAll(PDO::FETCH_ASSOC);
	if ($data != null){
		$sql  = 'UPDATE Site SET '.'count='.($data[0]['count'] + 1).' WHERE site='.'"'.$x.'"';
		$pdo -> exec($sql);
	}else{
		$sql  = 'INSERT INTO Site(site,count) VALUES('.'"'.$x.'"'.',1)';
		$pdo -> exec($sql);
        }
    }catch(PDOException $e)
    {
            return $sql . "<br>" . $e->getMessage();
    }
}
function Query_the_count_of_site_in_Site($x){
    try{
        global $pdo;
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$sql  = 'SELECT count FROM Site WHERE site='.'"'.$x.'"';
	$res  = $pdo -> query($sql);
	$data = $res -> fetchAll(PDO::FETCH_ASSOC);
	if ($data != null){
		return $data[0]['count'];
	}else{
		return 0;
	}
    }catch(PDOException $e)
    {
            return $sql . "<br>" . $e->getMessage();
    }
}
?>
