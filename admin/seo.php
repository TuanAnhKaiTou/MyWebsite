<?
$db_table=$db_prefix."seo";
switch($act)
{
	case "manager":
		 manager();
		 break;
	case "add":
		 add();
		 break;
	case "search":
		 search();
		 break;
	case "lock":
		 check('status',1);
		 break;
	case "unlock":
		 check('status',0);
		 break;
	case "del":
		 del();
		 break;
	case "edit":
		 edit();
		 break;
	default: manager();
}
function check($field_db,$status)
{
	global $cmd,$db,$db_table,$upload_dir,$id,$act;
	if($status==1)
		$sql="update $db_table set $field_db = 0 where id=$id ";
	else
		$sql="update $db_table set $field_db = 1 where id=$id ";
	$result=$db->myquery($sql);
	if($db->affected_rows==1)
		message("Thành Công",$cmd,'manager');
	else
		message("Thất Bại",$cmd,'manager');
		
}
function search()
{
echo "đây là hàm search";
}
function manager()
{
global $cmd,$db,$db_table,$upload_dir,$paper;
$stt=1;
$rs='
<div class="col-sm-12">
<div class="table-responsive">          
	<table class="table">
		<thead>
		  <tr>
			<th>STT</th>
			<th>Images</th>
			<th>Name</th>
			<th>Link</th>
			<th>Status</th>
			<th>Edit</th>
			<th>Delete</th>
			<th>Date</th>
		  </tr>
		</thead>
		<tbody>
';
$sql="Select * From $db_table";
$total=$db->num_row($db->query($sql));//Tổng số dòng lấy về từ database
$page = (int)$db->get('page',1);//Lấy số trang hiện hành
$setLimit =$paper;//số dòng trên 1 trang, ví dụ 2 dòng trên 1 trang
$pageLimit = ($page * $setLimit) - $setLimit;//xác định số trang từ tổng số dòng lấy về từ biến $total
$result=$db->myquery($sql." LIMIT ".$pageLimit." , ".$setLimit);
while($row=$db->fetch_row($result))
{
	if($row['status']==1)
		$status='<td title="Sp hiện đang hoạt động"><a href="index.php?cmd='.$cmd.'&act=lock&id='.$row['id'].'" class="btn btn-success"><i class="fa fa-unlock"></i></a></td>';
	else
		$status='<td title="Sp hiện đang bị khóa"><a href="index.php?cmd='.$cmd.'&act=unlock&id='.$row['id'].'" class="btn btn-default"><i class="fa fa-unlock"></i></a></td>';
	$rs.= '
  <tr>
	<td>'.($stt++).'</td>
	<td>'.img_display($row['img'],50,0).'</td>
	<td>'.$row['name'].'</td>
	<td>'.$row['date'].'</td>
	'.$status.'
	<td><a href="index.php?cmd='.$cmd.'&act=edit&id='.$row['id'].'" class="btn btn-warning"><i class="fa fa-edit"></i></a></td>
	<td><a href="index.php?cmd='.$cmd.'&act=del&id='.$row['id'].'&img='.$row['img'].'" class="btn btn-danger"><i class="fa fa-trash-o"></i></a></td>
  </tr>
';
}
$rs.='
</tbody>
</table>
'.displayPaginationBelow($cmd,$total,$setLimit,$page).'
</div>
</div>
';
echo $rs;
}
function add()
{
global $cmd,$db,$db_table,$upload_dir,$act;
if(isset($_POST['btnsub']))
{
$name=$db->post('name');
$link=$db->post('link');
$description=$db->post('description');
$img=upload_file('img');
$keyword=$db->post('keyword');

$sql="insert into $db_table
(`name`,`img`,`keyword`,`link`,`description`) values
('$name','$img','$keyword','$link','$description')
";
if($db->myquery($sql))
message("Thành Công",$cmd,'manager');
else
message("Thất Bại",$cmd,$act);

}
?>
<form name="frmadd" action="" method="POST" accept-charset="UTF-8" enctype="multipart/form-data">
  <div class="form-group">
  <div class="form-group">
    <label for="link">Link:</label>
    <input type="text" class="form-control" id="link" name="link">
  </div>
    <label for="name">Name:</label>
    <input type="text" class="form-control" id="name" name="name">
  </div>
  <div class="form-group">
    <label for="img">Images:</label>
    <input type="file" class="form-control" id="img" name="img[]" multiple >
  </div>
   
  <div class="form-group">
    <label for="keyword">Keyword:</label>
    <textarea  class="form-control" id="keyword" name="keyword"></textarea>
  </div>
    <div class="form-group">
	<label for="description">Description:</label>
	<textarea  class="form-control" id="description" name="description"></textarea>
  </div>
  <button type="submit" class="btn btn-default all" name="btnsub"><i class="fa fa-send"></i>&nbsp;Submit</button>
</form>
<?
}
function del()
{
	global $cmd,$db,$db_table,$upload_dir,$thumb_dir,$id;
	$sql="select img from $db_table where id=$id ";
	$result=$db->myquery($sql);
	
	if($db->num_row($result)==1)
	{
		$row=$db->fetch_row($result);
		$img=$row['img'];
		$sql="delete from $db_table where id = $id ";
		$result=$db->myquery($sql);
		if($db->affected_rows!=0)
		{
			if(file_exists($upload_dir.$img))
			unlink($upload_dir.$img);
			if(file_exists($thumb_dir.$img))
			unlink($thumb_dir.$img);
			message("Thành công",$cmd,'manager');
		}
		else
			message("Thất bại",$cmd,'manager');
	}
	else
			message("Thất bại ",$cmd,'manager');
}
function edit()
{
	global $cmd,$db,$db_table,$upload_dir,$act,$id;
	if(isset($_POST['btnsub']))
	{
		$name=$db->post('name');
		$description=$db->post('description');
		$img=upload_file('img');
		if($img=="") $img=$db->post('oldimg');
		$keyword=$db->post('keyword');
		$link=$db->post('link');
		$sql="update $db_table set
		`name`='$name', `img`='$img',
		`keyword`='$keyword',
		`link`='$link',`description`='$description'
		where id=$id";	
		if($db->myquery($sql))
		message("Thành Công",$cmd,'manager');
		else
		message("Thất Bại",$cmd,$act);
	}
	$sql="select * from $db_table where id=$id";
	$result=$db->myquery($sql);
	$row=$db->fetch_row($result);
	
?>
<form name="frmadd" action="" method="POST" accept-charset="UTF-8" enctype="multipart/form-data">
  <div class="form-group">
    <label for="link">Link:</label>
    <input type="text" class="form-control" id="link" name="link" value="<?=$row['link']?>">
  </div>
	<div class="form-group">
    <label for="name">Name:</label>
    <input type="text" class="form-control" id="name" name="name" value="<?=$row['name']?>">
  </div>
  <div class="form-group">
    <label for="img">Images:</label>
	<?=img_display($row['img'],30)?>
	<input type="text" class="form-control" id="oldimg" name="oldimg" value="<?=$row['img']?>">
    <input type="file" class="form-control" id="img" name="img[]" multiple >
  </div>
  <div class="form-group">
    <label for="keyword">Keyword:</label>
    <textarea  class="form-control" id="keyword" name="keyword"><?=$row['keyword']?></textarea>
  </div>
    <div class="form-group">
	<label for="description">Description:</label>
	<textarea  class="form-control" id="description" name="description"><?=$row['description']?></textarea>
  </div>
  <button type="submit" class="btn btn-default all" name="btnsub"><i class="fa fa-send"></i>&nbsp;Submit</button>
</form>
<?
}
?>

		