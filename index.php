<!DOCTYPE html>
<html>
	<head>
		<title>Random | aldiunanto.com</title>
		<script type="text/javascript" src="http://<?php echo $_SERVER['HTTP_HOST'] ?>/random/jquery-1.10.2.min.js"></script>
		<script type="text/javascript">
			var main = function(){
				$('form').on('submit', function(e){
					e.preventDefault(); var form = $(this); $('.loader').show();
					var process = function(){
						$.ajax({
							type: form.attr('method'), url: form.attr('action'),
							data: form.serialize(), dataType: 'json', cache: false,
							success: function(data){$('.loader').hide();$('.container').hide().html(data).fadeIn(700);}
						});
					};
					
					setTimeout(function(){
						process();
					}, 1500);
				});
			}; $(main);
		</script>
	
		<style type="text/css">
			<!--
				
				body{ font-family: verdana, tahoma; font-size: 12px; }
				.loader{
					display:    none;
					position:   fixed;
					z-index:    1000;
					top:        0;
					left:       0;
					height:     100%;
					width:      100%;
					background: rgba( 255, 255, 255, .8 ) 
								url('load.gif') 
								50% 50% 
								no-repeat;
				}
				table tr > td{ padding: 4px; }
				.container{
					margin-top: 20px;
				}
				footer{
					margin: 100px 0 0 0;
					padding: 10px;
					color: #c2c2c2;
					text-align: center;
					border: 1px solid #dddddd;
				}
				footer a{ color: #000; }
				footer a:hover{ text-decoration: none; }
			
			-->
		</style>
	</head>
<body>
	<div class="loader"></div>
	<form action="randomact.php" method="post">
	<table>
		<tr>
			<td>Masukkan Jumlah Peserta</td>
			<td>:</td>
			<td><input type="text" name="peserta" /></td>
		</tr>
		<tr>
			<td>Masukkan jumlah kelompok yang akan dibuat</td>
			<td>:</td>
			<td><input type="text" name="jml_klmpk" /></td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td><input type="submit" value="Buat Kelompok!" /></td>
		</tr>
	</table>
	</form>

	<div class="container" style="display:none;"></div>
	
	<footer>
		<p>Created by: <a href="http://aldiunanto.com" target="_blank">Aldi Unanto</a></p>
		<p>aldiunanto@gmail.com | aldiunanto@yahoo.com | aldiunanto@icloud.com</p>
	</footer>	
</body>
</html>
