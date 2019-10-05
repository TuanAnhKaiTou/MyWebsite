<?
class db extends mysqli
{
private $sercet="kaitoukid141206071998";
public function __construct($host, $user, $password, $database) 
	{
			parent::__construct($host, $user, $password, $database);
			if(mysqli_connect_errno())
			{
				throw new exception(mysqli_connect_error(), mysqli_connect_errno()); 
			}
	}
	public function myquery($query)
	{
		if( !$this->real_query($query) ) {
			throw new exception( $this->error, $this->errno );
		}

		$result = new mysqli_result($this);
		return $result;
	}
	public function num_row($result)
	{
		return mysqli_num_rows($result);
	}
	public function fetch_row($result)
	{
		return mysqli_fetch_array($result);
	}
public function encrypt($data)
{
	$data=md5($this->sercet.$data);
	$data=hash('sha1',$data);
	return $data;
}
public function generate_salt($password,$usermail)
{
	$data=$this->encrypt($password.$usermail.time());
	return $data;
}
public function update_salt($usermail,$password)
{
	$salt=$this->generate_salt($usermail,$password);
	$sql="update db_tblaccount set `salt`='$salt' where usermail='".$usermail."' and status=1";
	
	if($this->myquery($sql))
	{
		$_SESSION['login']['salt']=$salt;
		return true;
	}
	else
	{
		$_SESSION['login']['state']="";
		return false;
	}
}
public function check_salt()
{
$sql="select salt from db_tblaccount where usermail='".$_SESSION['login']['usermail']."' and salt='".$_SESSION['login']['salt']."' and status=1";
$result=$this->myquery($sql);
if($this->num_row($result)==1)
{
	return true;
}
else
{
	return false;
}
}
public function login($usermail,$password)
{
$password=$this->encrypt($password);
$sql="select * 
from db_tblaccount 
where usermail ='".$usermail."' and 
password='".$password."' and 
status=1";
$result=$this->myquery($sql);
if($this->num_row($result)==1)
{
$row=$this->fetch_row($result);
$_SESSION['login']['state']=true;
$_SESSION['login']['name']=$row['name'];
$_SESSION['login']['usermail']=$row['usermail'];
$_SESSION['login']['images']=$row['img'];
if($this->update_salt($usermail,$password))
$this->redirect("index.php");
else
$this->redirect("login.php");
}
}
public function checklogin($dir="../")
{
if(!$this->check_salt())
$this->redirect("login.php",$dir);
}
public function redirect($filename,$dir="../")
{
header("location: ".$dir.$filename);
}
public function post($data)
{
isset($_POST[$data])?$result=$_POST[$data]:$result='';
return $result;
}
public function get($data,$value_default="")
{
isset($_GET[$data])?$result=$_GET[$data]:$result=$value_default;
return $result;
}
public function display($data)
{
isset($_SESSION['login'][$data])?$result=$_SESSION['login'][$data]:$result=null;
return $result;
}
function logout()
{
	unset($_SESSION['login']);
	session_destroy();
}

function cat_menu($db_table="db_tblcat")
{
	global $db_prefix;
	$rs='<ul class="m-list">';
	$sql="select * from ".$db_prefix.$db_table." where status=1";
	$result=$this->myquery($sql);
	while($row=$this->fetch_row($result))
	{	
		$rs.='<li><a href="index.php?cmd=cat&id='.$row['id'].'"><span>'.$row['name'].'</span><i class="fa fa-angle-right f-right" ></i></a></li>';
	}
	$rs.="</ul>";
	return $rs;
}
function main_cat_product($db_table="db_tblcat")
{
	global $db_prefix;
	$rs='';$i=0;
	$sql="select * from ".$db_prefix.$db_table." where status=1";
	$result=$this->myquery($sql);
	while($row=$this->fetch_row($result))
	{	
	$rs.='
	<section class="box-product">
	<div class="title"><h2>'.$row['name'].'</h2></div>
	<div class="product">
	'.$this->main_product("product",$row['id'],"product".$i).'
	</div>
	</section>';
	$i++;
	}
	return $rs;
}
function main_product($db_table="db_tblcat",$id,$idcarousel)
{
	global $db_prefix;
	$rs='<div class="owl-carousel" id="'.$idcarousel.'">';
	$sql="select * from ".$db_prefix.$db_table." where idcat=$id and status=1";
	$result=$this->myquery($sql);
	while($row=$this->fetch_row($result))
	{
		$url="index.php?cmd=detail&id=".$row['id'];
		$rs.='<div class="item">
				<a href="'.$url.'" class="item-img">
				'.img_display($row['img'],50,0).'
				</a>
				<a href="'.$url.'" class="item-name">
				'.$row['name'].'
				</a>
				<div class="item-price">
					<span class="line-through">'.number_format($row['price']).' đ</span>
					<span class="main-color txt-b">'.number_format($row['price']-$row['price']*$row['discount']/100).' đ</span>
				</div>
				<a href="#" class="btn main-bg white">
				<i class="fa fa-shopping-bag"></i>Mua hàng
				</a>
				<div class="discount bg-red white txt-b">
					<span><i class="fa fa-arrow-down"></i>'.$row['discount'].'%</span>
				</div>
				<a href="'.$url.'" class="view">
				<span class="main-bg white"><i class="fa fa-info"></i>Chi tiết </span>
				</a>
			</div>
		 ';
	}
	$rs.="</div>";
	return $rs;
}
function list_cat_product($db_table="db_tblcat",$id)
{
	global $db_prefix;
	$rs='
	<section class="box-product">
	<div class="product">';
	if($id==0)
		$sql="select * from ".$db_prefix.$db_table." where status=1";
	else
		$sql="select * from ".$db_prefix.$db_table." where idcat=$id and status=1";
	$result=$this->myquery($sql);
	while($row=$this->fetch_row($result))
	{
		$url="index.php?cmd=detail&id=".$row['id'];
		$rs.='
		<div class="item item-cat">
			<a href="'.$url.'" class="item-img">
			<img src="upload/thumb/'.$row['img'].'" alt="Tên sản phẩm"/>
			</a>
			<a href="'.$url.'" class="item-name">
			'.$row['name'].'
			</a>
			<div class="item-price">
				<span class="line-through">'.number_format($row['price']).' đ</span>
				<span class="main-color txt-b">'.number_format($row['price']-$row['price']*$row['discount']/100).' đ</span>
			</div>
			<a href="#" class="btn main-bg white">
			<i class="fa fa-shopping-bag"></i>Mua hàng
			</a>
			<div class="discount bg-red white txt-b">
				<span><i class="fa fa-arrow-down"></i>'.$row['discount'].'%</span>
			</div>
			<a href="'.$url.'" class="view">
			<span class="main-bg white"><i class="fa fa-info"></i>Chi tiết </span>
			</a>
		</div>
	 ';
	}
	$rs.="
	</div>
	</section>
	";
	return $rs;
}
function path($db_table,$id)
{
	global $db_prefix;
	$sql="select * from ".$db_prefix.$db_table." where id=$id and status=1";
	$result=$this->myquery($sql);
	$row=$this->fetch_row($result);
	$rs="
	<a href='index.php?cmd=cat&id=0'><i class='fa fa-angle-right'></i>Danh mục</a>
	<a href='index.php?cmd=cat&id='><i class='fa fa-angle-right'></i>".$row['name']."</a>
	";
	return $rs;
}
function id_to_name($db_table="db_tblcat",$id)
{
	$sql="select * from $db_table where id=$id and status=1";
	$result=$this->myquery($sql);
	$row=$this->fetch_row($result);
	return $row['name'];
}
function seo($cmd, $id, $link, &$data=array())
{
	global $db_prefix;
	if($cmd=="cat")
		$sql="select * from ".$db_prefix."cat where id=$id and status=1";
	else if($cmd=="detail")
		$sql="select * from ".$db_prefix."cat where id=$id and status=1";
	else
		$sql="select * from ".$db_prefix."seo where link='$link' and status=1";
		$result=$this->myquery($sql);
		$row=$this->fetch_row($result);
		isset($row["name"])?$data["name"]=$row["name"]:$data["name"]="";
		isset($row["keyword"])?$data["keyword"]=$row["keyword"]:$data["name"]="";
		isset($row["description"])?$data["description"]=$row["description"]:$data["description"]="";
		isset($row["content"])?$data["content"]=$row["content"]:$data["content"]="";
		isset($row["img"])?$data["img"]=$row["img"]:$data["img"]="";
		return $data;		
}

public function __destruct()
{
	parent::close();
}
}
?>