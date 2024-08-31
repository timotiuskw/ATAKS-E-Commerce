<?php
define('DB_SERVER','localhost');
define('DB_USER','root');
define('DB_PASS' ,'');
define('DB_NAME', 'test');

class Database {
	public $conn;
	function __construct()
	{
		$this->conn = new mysqli(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
	}
	public function insProduk($nama,$hrg,$jml,$ket,$foto,$penjual){
		$sql = "insert into barang (nama,hrg,jml,keterangan,foto,penjual) values ('$nama',$hrg,$jml,'$ket','$foto','$penjual')";
		$hasil=$this->conn->query($sql);
		return $hasil;
	}
	public function produkAll(){
		$sql="select * from barang";
		$hasil=$this->conn->query($sql); 
		return $hasil;
	}
	public function getFoto($id){
		$sql="select foto from barang where id='$id'";
		$hasil=$this->conn->query($sql); 
		while ($row=$hasil->fetch_assoc()){
			$foto=$row['foto'];   
		}
		return $foto;
	}	
	public function produk($id){
		$sql="select * from barang where id='$id'";
		$hasil=$this->conn->query($sql); 
		return $hasil;
	}

	public function profil($user){
		$sql="select * from profile where username='$user'";
		$hasil=$this->conn->query($sql);
		return $hasil;
	}

	public function updProfile($id,$username,$alamat,$tgllahir,$notelp,$email){

		$sql = "update profile set username='$username',alamat='$alamat',tgllahir='$tgllahir',notelp='$notelp',email='$email' where id='$id'";
		$hasil=$this->conn->query($sql);
		return $hasil;
	}

	public function updProduk($id,$nama,$hrg,$jml,$ket,$foto){
		if ($foto=="")
			$sql = "update barang set nama='$nama',hrg='$hrg',jml='$jml',keterangan='$ket' where id='$id'";
		else
			$sql = "update barang set nama='$nama',hrg='$hrg',jml='$jml',keterangan='$ket',foto='$foto' where id='$id'";

		$hasil=$this->conn->query($sql);
		return $hasil;
	}

	public function delProduk($id){		
		$sql="delete from barang where id=$id";
		$hasil=$this->conn->query($sql);
		return $hasil;
	}

	public function pemesanan($id) {
		$sql="select * from pemesanan where id=$id";
		$hasil=$this->conn->query($sql);
		return $hasil;
	}

}
?>