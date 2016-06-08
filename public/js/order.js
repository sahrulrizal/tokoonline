var link = 'http://'+window.location.hostname+'/ukk/';

$(".loader").hide();
$("#jenis_b").on('change',function(e) {
	e.preventDefault();
	var i = $(this).val();
	if (i=='kiloan') {
		$("#kilo").fadeIn().show();
	}else if (i=='satuan') {
		$("#kilo").fadeOut().hide();
	}
	if ($("#eJenisB").hasClass('has-error')) {
		$("#eJenisB").removeClass('has-error');
	}else{

	}
});
$("#jenis_p").change(function(e) {
	e.preventDefault();
	if ($("#eJenisP").hasClass('has-error')) {
		$("#eJenisP").removeClass('has-error');
	}else{

	}
})
$("#jenis_c").on('change',function (e) {
	e.preventDefault();
	var id = $(this).val(),kg = $("#berat").val(),hrg = $("#hpk").val();
	if (id!='-1') {
		$("#eJenisC").removeClass('has-error');
	}else{

	}
	$.ajax({
		url: link+'proses_private/get_harga_jeniscucian',
		data: {'id_jenisC':id},
		type: 'GET',
		dataType:'json',
		beforeSend:function() {
			$("#hpk").attr('placeholder','Mohon tunggu');
			$("#hpk_view").attr('placeholder','Mohon tunggu');
		},
		success:function(data) {
			var hrgnya = data.harga;
			$("#hpk").val(data.harga);
			$("#hpk_view").val(data.harga);
			var tot = kg*hrgnya;
			if (kg=="") {
				$("#total_view").val("");
				$("#total").val("");
			}else{
				$("#total").val(tot);
				$("#total_view").val(tot);
			}
		}
	});

});
$("#berat").on("keyup",function(e) {
	e.preventDefault();
	var kg = $(this).val(),
	hrgjenisc = $("#hpk").val(),
	itung = kg*hrgjenisc;
	if ($("#jenis_c").val()=='-1') {
		$("#eJenisC").addClass('has-error');
		$("#total_view").attr('placeholder','Pilih jenis cucian terlebih dahulu');
	}else{
		if (kg=="") {
			$("#eBerat").addClass('has-error');
			$("#alBerat").html("Nilai tidak boleh kosong");
		}else if(kg<3){
			$("#eBerat").addClass('has-error');
			$("#alBerat").html("Minimal pemesanan adalah 3kg atau lebih");
		}else if(kg>200){

		}else{
			$("#eBerat").removeClass('has-error');
			$("#alBerat").html("");	
		}
		$("#total").val(itung);
		$("#total_view").val(itung);
		$("#eJenisC").removeClass('has-error');
	}
});
function toTop() {
	$('html, body').animate({
		scrollTop: $(".content-header").offset().top
	}, 200);
}