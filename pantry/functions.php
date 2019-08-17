<?php
define("DEVELOPMENT",TRUE);
function dbConnect(){
	$db=new mysqli("localhost","root","","kura_resto");
	return $db;

	
}

// digunakan untuk mengambil data sebuah bahan baku
function getDataBahanBaku($id_bbaku){
	$db=dbConnect();
	if($db->connect_errno==0){
		$res=$db->query("SELECT * FROM bahan_baku WHERE id_bbaku='$id_bbaku'");
		if($res){
			if($res->num_rows>0){
				$data=$res->fetch_assoc();
				$res->free();
				return $data;
			}
			else
				return FALSE;
		}
		else
			return FALSE; 
	}
	else
		return FALSE;
}

// digunakan untuk mengambil data sebuah belanja
function getDataBelanja($id_belanja){
	$db=dbConnect();
	if($db->connect_errno==0){
		$res=$db->query("SELECT * FROM belanja JOIN bahan_baku ON belanja.id_bbaku = bahan_baku.id_bbaku WHERE belanja.id_belanja='$id_belanja'");
		if($res){
			if($res->num_rows>0){
				$data=$res->fetch_assoc();
				$res->free();
				return $data;
			}
			else
				return FALSE;
		}
		else
			return FALSE; 
	}
	else
		return FALSE;
}


function banner(){
	?>
<div id="banner"><center><h1>Login</h1><center>
</div>
	<?php
}
function navigator(){
	?>
<div id="navigator"><center>
| <a href="bbaku.php">Bahan Baku</a> 
| <a href="reqbbaku.php">List Req Bahan Baku</a> 
| <a href="belanja-databelanja.php">Belanja</a>  
| <a href="logout.php">Logout</a> 
<hr></center>
</div>
	<?php
}
function showError($message){
	?>
<div style="background-color:#FAEBD7;padding:10px;border:1px solid red;margin:15px 0px">
<?php echo $message;?>
</div>
	<?php
}
?>