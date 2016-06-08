function delogo(id) {	
	$.ajax({
		url: '../vp/delogo'+'/'+id,
		type: 'GET',
		dataType: 'html',
	})

	.done(function(data) {
		$('#hlogo').html(data);
	})

	.fail(function() {
		console.log('Error : Saya yakin bisa menyelesaikan tugas ini ');
	});
}

function debanner(id) {	
	$.ajax({
		url: '../vp/debanner'+'/'+id,
		type: 'GET',
		dataType: 'html',
	})

	.done(function(data) {
		$('#hbanner').html(data);
	})

	.fail(function() {
		console.log('Error : Saya yakin bisa menyelesaikan tugas ini ');
	});
}



// function dm(id) {	
// 	$.ajax({
// 		url: '../proses_private/json_dm'+'/'+id,
// 		type: 'GET',
// 		dataType: 'json',
// 	})

// 	.done(function(data) {

// 			// Edit
// 			$('#id').val(data.id_member);
// 			$('#id2').val(data.id_user);
// 			$('#nama').val(data.nama_member);
// 			$('#jk').val(data.jk_member);
// 			$('#username').val(data.username);
// 			$('#email').val(data.email_member);
// 			$('#password').val(data.password);
// 			$('#telp').val(data.telp_member);
// 			$('#type').text(data.type_user);
// 			$('#status').val(data.status);
// 			$('#alamat').val(data.alamat_member);

// 			// View
// 			$('#vnama').text(data.nama_member);
// 			$('#vjk').text(data.jk_member);
// 			$('#vusername').text(data.username);
// 			$('#vemail').text(data.email_member);
// 			$('#vpassword').text(data.password);
// 			$('#vtelp').text(data.telp_member);
// 			$('#vtype').text(data.type_user);
// 			$('#valamat').text(data.alamat_member);
// 		})

// 	.fail(function() {
// 		console.log('Error : Saya yakin bisa menyelesaikan tugas ini ');
// 	});
// }

// function sup(id) {	
// 	$.ajax({
// 		url: '../proses_private/json_sup'+'/'+id,
// 		type: 'GET',
// 		dataType: 'json',
// 	})

// 	.done(function(data) {

// 			// Edit
// 			$('#id').val(data.id_supplier);
// 			$('#nama').val(data.nama_supp);
// 			$('#telp').val(data.telp_supp);
// 			$('#alamat').val(data.alamat_supp);
// 			$('#nm').val(data.nama_barang);
// 			$('#hs').val(data.harga_satuan);
// 			$('#jenis').val(data.jenis_barang);

// 			// View
// 			$('#vnama').text(data.nama_supp);
// 			$('#vtelp').text(data.telp_supp);
// 			$('#valamat').text(data.alamat_supp);
// 			$('#vnm').text(data.nama_barang);
// 			$('#vhs').text(data.harga_satuan);
// 			$('#vjenis').text(data.jenis_barang);
// 		})

// 	.fail(function() {
// 		console.log('Error : Saya yakin bisa menyelesaikan tugas ini ');
// 	});
// }

// function dp(a) {	
// 	var id = a.value;
// 	$.ajax({
// 		url: '../proses_private/json_dp'+'/'+id,
// 		type: 'GET',
// 		dataType: 'json',
// 	})

// 	.done(function(data) {

// 			// Tambah
// 			$('#tid').val(data.id_supplier);
// 			$('#tbb').val(data.jenis_barang);
// 			$('#tnama_barang').val(data.nama_barang);
// 			$('#tjumlah').css({"display": "block"});
// 			$( ".tj" ).keyup(function() {
// 				var hasil = $('#tjumlah').val()*data.harga_satuan;
// 				$('#tharga').val(hasil);
// 			});

// 			// Edit
// 			$('#id').val(data.id_supplier);
// 			$('#nama').text(data.nama_supp);
// 			$('#harga').text(data.harga_satuan);
// 			$('#bb').text(data.jenis_barang);

// 			// View
// 			$('#vnama').text(data.nama_supp);
// 			$('#vharga').text(data.harga_satuan);
// 			$('#vbb').text(data.jenis_barang);
// 		})

// 	.fail(function() {
// 		console.log('Error : Saya yakin bisa menyelesaikan tugas ini ');
// 	});
// }

// function dpm(a) {	
// 	var id = a.value;
// 	$.ajax({
// 		url: '../proses_private/json_dpm'+'/'+id,
// 		type: 'GET',
// 		dataType: 'html',
// 	})

// 	.done(function(data) {
// 		$('#t-supplier').html(data);
// 	})

// 	.fail(function() {
// 		console.log('Error : Saya yakin bisa menyelesaikan tugas ini ');
// 	});
// }