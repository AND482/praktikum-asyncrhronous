<?php
echo $action = $_REQUEST['action'];

parse_str($_REQUEST['data'], $hasil);  
echo "Name: ".$hasil['namalengkap']."<br/>";
echo "Nick Name: ".$hasil['namapanggilan']."<br/>";
echo "Username: ".$hasil['username']."<br/>";

//$hasil = $_REQUEST;
$identitas = $_FILES["foto"];	

$username = trim($hasil['username']);
if (!empty($identitas["name"]) and !empty($username)){
	$namafile = $identitas["name"];		//nama filenya
	preg_match("/([^\.]+$)/", $namafile, $ext);		//Regex: mencari string sesudah titik terakhir, saved in array ext
	$file_ext = strtolower($ext[1]);
	$namabaru = $hasil['username'].".".$ext[1];	//nama file barunya [ccnumber].png
    $file = $identitas["tmp_name"];						//source filenya 
    //perform the upload operation
	$extensions= array("jpg","png");				//extensi file yang diijinkan
	//Kirim pesan error jika extensi file yang diunggah tidak termasuk dalam extensions
	$errors = array();
	if(in_array($file_ext,$extensions) === false)
	 $errors[] = "Extensi yang diperbolehkan jpg atau png.";
	
	//Kirim pesan error jika ukuran file > 500kB
	$file_size = $identitas['size'];
	if($file_size > 2097152)
	 $errors[] = "Ukuran file harus lebih kecil dari 2MB.";
    
	//Upload file
	if(empty($errors)){
		if(move_uploaded_file($file, "AND/" . $namabaru))
			echo "Uploaded dengan nama $namabaru";
	}
	}
else echo $errors[] = "Lengkapi username dan gambarnya. ";
echo "<br/>";

if(!empty($errors)){
	echo "Error : ";
	foreach ($errors as $val)
		echo $val;
}
/* SQL: select, update, delete */

if($action == 'create')
	$syntaxsql = "insert into pendaftaran values (null,'$hasil[namalengkap]','$hasil[namapanggilan]', '$hasil[stanbuk]', '$hasil[username]', 
	'$hasil[email]', '$hasil[jurusan]', '$hasil[statee]', '$hasil[prodi]', '$hasil[gender]', '$hasil[phonenumber]', '$hasil[address]', '$hasil[alasan]',now(), '$namabaru')";
elseif($action == 'update')
	$syntaxsql = "update tabel_pendaftaran set Nama_Lengkap = '$hasil[namalengkap]', Nama_Panggilan = '$hasil[namapanggilan]', NIM = '$hasil[stanbuk]', 
	Username = '$hasil[username]', Email ='$hasil[email]', Jurusan = '$hasil[jurusan]', Jenjang_Pendidikan = '$hasil[statee]', Program_Studi = '$hasil[prodi]', 
	Jenis_Kelamin = '$hasil[gender]', Nomor_Telpon = '$hasil[phonenumber]', Alamat = '$hasil[address]', Alasan_Daftar'$hasil[alasan]', foto = '$namabaru' where username = '$hasil[username]'";
elseif($action == 'delete')
	$syntaxsql = "delete from pendaftaran where username = '$hasil[username]'";
elseif($action == 'read')
	$syntaxsql = "select * from pendaftaran";
	
//eksekusi syntaxsql 
$conn = new mysqli("localhost","root","04AGUSTUS2000","FORMPENDAFTARAN"); //dbhost, dbuser, dbpass, dbname
if ($conn->connect_errno) {
  echo "Failed to connect to MySQL: " . $conn -> connect_error;
  exit();
}else{
  echo "Database connected. ";
}
//create, update, delete query($syntaxsql) -> true false
if ($conn->query($syntaxsql) === TRUE) {
	echo "Query $action with syntax $syntaxsql suceeded !";
}
elseif ($conn->query($syntaxsql) === FALSE){
	echo "Error: $syntaxsql" .$conn->error;
}
//khusus read query($syntaxsql) -> semua associated array
else{
	$result = $conn->query($syntaxsql); //bukan true false tapi data array asossiasi
	if($result->num_rows > 0){
		echo "<table id='tresult' class='table table-striped table-bordered'>";
		echo "<thead><th>Nama_Lengkap</th><th>Nama_Panggilan</th><th>NIM</th><th>Username</th><th>Email</th><th>Jurusan</th><th>Jenjang_Pendidikan</th> 
		<th>program_Studi</th><th>Jenis_Kelamin</th><th>Nomor_Telpon</th><th>Alamat</th><th>Alasan_Daftar</th></thead>";
		echo "<tbody>";
		while($row = $result->fetch_assoc()) {
			echo "<tr><td>".$row['Nama_Lengkap']."</td><td>". $row['Nama_Panggilan']."</td><td>". $row['NIM']."</td><td>". $row['Username']."</td>
			<td>". $row['Email']."</td><td>". $row['Jurusan']."</td><td>". $row['Jenjang_Pendidikan']."</td><td>". $row['Program_Studi']."</td>
			<td>". $row['Jenis_Kelamin']."</td><td>". $row['Nomor_Telpon']."</td><td>". $row['Alamat']."</td><td>". $row['Alasan_Daftar'].$row['foto']."</td></tr>";
		}
		echo "</tbody>";
		echo "</table>";
	}
}
$conn->close();

?>
