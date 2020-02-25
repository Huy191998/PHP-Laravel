$(document).ready(function () {
	$('#qty').blur(function() {
		let rowid = $(this).data('id');
		$.ajax({
			alet();
			url:'cart/'+rowid,
			tupe: 'put',
			dataType:'json',
			data:{
				qty: $(this).val(),
			},
			success: function(data) {
				console.log(data);
			}
		});
	});
});