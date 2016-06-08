var url = 'http://'+window.location.host+'/'+'pelangibaby';

function delogo(id) {	
	$.ajax({
		url: url+'/vp/delogo'+'/'+id,
		type: 'GET',
		dataType: 'html',
	})

	.done(function(data) {
		$('#hlogo').html(data);
		$('#lo').css({"display": "none"});
	})

	.fail(function() {
		console.log('Error : Saya yakin bisa menyelesaikan tugas ini ');
	});
};

function debanner(id) {	
	$.ajax({
		url: url+'/vp/debanner'+'/'+id,
		type: 'GET',
		dataType: 'html',
	})

	.done(function(data) {
		$('#hbanner').html(data);
		$('#be').css({"display": "none"});
	})

	.fail(function() {
		console.log('Error : Saya yakin bisa menyelesaikan tugas ini ');
	});
};

// Produk

function deproimg(id,img) {	
	$.ajax({
		url: url+'/vp/deproimg'+'/'+id+'/'+img,
		type: 'post',
		dataType: 'html',
	})

	.done(function(data) {
		$('#hproimg').html(data);
		$('#proimg').css({'display' : 'none'});
	})

	.fail(function() {
		console.log('Error : Saya yakin bisa menyelesaikan tugas ini ');
	});
}

// Slider

function desliimg(id,img) {	
	$.ajax({
		url: url+'/vp/desliimg'+'/'+id+'/'+img,
		type: 'post',
		dataType: 'html',
	})

	.done(function(data) {
		$('#hsliimg').html(data);
		$('#sliimg').css({'display' : 'none'});
	})

	.fail(function() {
		console.log('Error : Saya yakin bisa menyelesaikan tugas ini ');
	});
}

// Promo

function depromimg(id,img) {	
	$.ajax({
		url: url+'/vp/depromimg'+'/'+id+'/'+img,
		type: 'post',
		dataType: 'html',
	})

	.done(function(data) {
		$('#hpromimg').html(data);
		$('#promimg').css({'display' : 'none'});
	})

	.fail(function() {
		console.log('Error : Saya yakin bisa menyelesaikan tugas ini ');
	});
}
