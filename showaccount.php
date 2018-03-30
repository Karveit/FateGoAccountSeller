<?php
include ("conn.php");
include ("global.php");
$conn=mysql_connect($host,$uid,$pwd);
mysql_query("SET NAMES utf8");
$seledb=mysql_select_db($db,$conn);
$accountid = $_GET['id'];
$sql = "select * from account where ID = $accountid";
$result=mysql_fetch_array(mysql_query($sql,$conn));
if(!$conn){
die('服务器致命错误，请联系管理员。');
}else{
echo "数据成功读取！";
}
if (!$seledb){
	die("数据库选择异常");
	}
$carddata=$result['card'];
$arraycard=explode(',',$carddata);
$cardbjdata=$result['cardbj'];
$arraycardbj=explode(',',$cardbjdata);
$gnlzdata=$result['gnlz'];
$arraygnlz=explode(',',$gnlzdata);
$gnlzpdata=$result['gnlzp'];
$arraygnlzp=explode(',',$gnlzpdata);
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<title><?php echo $title?></title>
<body>
<table border = "1"width="30%">
<tr><th>账号信息 </th></tr>
<tr><th>注：呼符圣晶石为最低保障数，至少保障号内有不低于页面所述的数量。</th></tr> 
</table>
<table border = "1" width = "30%">
<tr>
 <td>序号</td>
 <td><? echo $accountid?></td>
 <td>呼符</td>
 <td><?echo $result['hf']?></td>
 <td>圣晶石</td>
 <td><?echo $result['stone']?></td>
 <td>魔力棱镜</td>
 <td><?echo $result['green']?></td>
 </tr>
</table>
<table border ="1" width = "30%">
<tr>
 <th colspan=100>英灵信息</th>
</tr>
<? foreach ($arraycard as $num=>$cardid) {
		echo "<td>"."<img src ="."\"img/hd/".$cardid.".jpg\"/>"."</td>";
    }
?>
<tr>
<th colspan=100>宝具</th>
</tr>
<tr align = center>
<? foreach ($arraycardbj as $num=>$cardbj) {
		echo "<td>".$cardbj."宝"."</td>";
    }
	?>
</tr>
<tr>
<th colspan=100>概念礼装</th></tr>
<? foreach ($arraygnlz as $num=>$gnlzid) {
		echo "<td>"."<img src ="."\"img/lz/".$gnlzid.".jpg\"/>"."</td>";
    }
?>
<tr>
<th colspan=100>礼装破数</th></tr>
<? foreach ($arraygnlzp as $num=>$gnlzp) {
		echo "<td>".$gnlzp."破"."</td>";
    }
?>
</table>
<?
if ($accountid == "1"){
	
	}else{echo "<a href ="."\""."showaccount.php?id=" .($accountid - 1)."\">"."上一个账号</a>";
		
		}
echo "<a href ="."\""."showaccount.php?id=" .($accountid + 1)."\">"."下一个账号</a>"?><br>
<a href ="<?echo $result['buylink'];?>">点击进入交易猫购买界面</a><p>购买安全有交易猫平台专业保障,所有钱款不经本站，请认准跳转后的域名是否为jiaoyimao.com。</p>
</body>
</html>