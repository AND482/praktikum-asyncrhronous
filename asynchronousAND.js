function kirimdata(e){
		var dataaction = $(this).find("button[type=submit]:focus").val();
		var strformencoded = $(this).serialize();
		
		
		var arrayform = $(this).serializeArray();
		//console.log(arrayform);

		filegbr = $("#identitas").prop('files')[0];
		filefoto = $("#foto").prop('files')[0];
		console.log(filefoto);
		df = new FormData();
		df.append("foto", filefoto);		//otomatis dikenali php dengan $_FILES['fotoku']
		df.append("data", strformencoded);	//dikenali php dengan $_REQUEST['dataku']
		df.append("action", dataaction);		//dikenali php dengan $_REQUEST['action']
		$.ajax({
			url: "ANDphp.php",
			type: "POST",
			data: df,
			processData: false,
			contentType: false,
			success: function (result) {
				$("#result").html(result);
			}
		});
		return false;
}