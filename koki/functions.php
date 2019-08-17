<?php
define("DEVELOPMENT",TRUE);
function dbConnect(){
	$db=new mysqli("localhost","root","","kura_resto");
	return $db;
}

// digunakan untuk mengambil data menu
function getDataMenu($id_menu){
	$db=dbConnect();
	if($db->connect_errno==0){
		$res=$db->query("SELECT * FROM menu WHERE id_menu='$id_menu'");
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


// digunakan untuk mengambil data menu
function getDataDetailMenu($id_menu){
	$db=dbConnect();
	if($db->connect_errno==0){
		$res=$db->query("SELECT * FROM detail_menu JOIN bahan_baku ON detail_menu.id_bbaku = bahan_baku.id_bbaku 
		                 WHERE detail_menu.id_menu='$id_menu'");
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

function getDataReqBahanBaku($id_req_bbaku){
	$db=dbConnect();
	if($db->connect_errno==0){
		$res=$db->query("SELECT * FROM req_bbaku JOIN bahan_baku ON
        req_bbaku.id_bbaku=bahan_baku.id_bbaku WHERE req_bbaku.id_req_bbaku='$id_req_bbaku'");
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


function getDataProduk($id_barang){
	$db=dbConnect();
	if($db->connect_errno==0){
		$res=$db->query("SELECT * FROM barang JOIN jenis ON
        barang.id_jenis=jenis.id_jenis WHERE barang.id_barang='$id_barang'");
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
<div id="banner"><center><h1>Bismillah Saja</h1><center>
</div>
	<?php
}
function navigator(){
	?>
<div id="navigator"><center>
| <a href="pesanan-list.php">List Pesanan</a> 
| <a href="menu-list.php">List Menu</a> 
| <a href="listbbaku.php">List Bahan Baku</a>  
| <a href="reqbbaku.php">Req Bahan Baku</a>  
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