<?php
	
		# array_rand() -> menghasilkan index. bukan value
		
		if(empty($_POST)){ exit('Access Forbidden!'); }
		if(empty($_POST['peserta']) || empty($_POST['jml_klmpk'])){
			echo json_encode('Semua field nya harus diisi yah kaka ... :)');
		}elseif(! is_numeric($_POST['peserta']) || ! is_numeric($_POST['jml_klmpk'])){
			echo json_encode('Isinya pake angka lah mas ... mba .. -___-"');
		}elseif($_POST['peserta'] < $_POST['jml_klmpk']){
			echo json_encode('Field jumlah murid tidak boleh lebih kecil dari banyaknya kelompok.');
		}else{
			$master = array(); $str = '';
			
			for($x = 1; $x <= $_POST['peserta']; $x++){
				array_push($master, $x);
			}
			
			for($x = 0; $x < $_POST['jml_klmpk']; $x++){
				$kelompok[$x] = array();
				
				for($y = 0; $y < floor($_POST['peserta'] / $_POST['jml_klmpk']); $y++){
					$person = array_rand($master);
					
					array_push($kelompok[$x], $master[$person]);
					unset($master[$person]);
				}
			}
			
			for($x = 0; $x < count($kelompok); $x++){
				$str .= '<p>Kelompok ke - '.($x + 1).' = '.implode(' - ', $kelompok[$x]).'</p>';
			}
			
			$str .= '<br />*Absen sisa = '.(count($master) == 0 ? '[Kosong]' : implode(', ', $master));
			echo json_encode($str);
		}
	
?>