
<form action="javascript:void(0)" method="get" id="registeranggota">
	<input type="text" id="namaanggota" value="" name="">
	<input type="text" id="idkoperasi" value="00001" name="">
	<button type="submit">Tambah</button>
</form>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript">
	$("#registeranggota").submit(function(event) {
		var data = new FormData($(this)[0]);
		$.ajax({
			url: 'http://localhost/koperasi_pkk/index.php/api/Logincontroller/apilogin',
			type: 'GET',
			data: {id_kop:$('#idkoperasi').val()},
			dataType: 'json',
			beforeSend:function (dada) {
				$("#loader").addClass('flex');
			},
			success:function(data) {
                    // console.log(data);
                    $.each(data.data, function(index, val) {
                    	$("#namaanggota").val(val.nama);
                    });
                },
            })
	});
</script>