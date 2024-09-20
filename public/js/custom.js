$(document ).ready(function() {
	$('.delete').on('click', function () {
		alert('ok');
	});
});



// string validation 
$(".txt").on("keydown keyup", function() {
	calculateSum();
});
	function calculateSum() {
	var sum = 0;
	$(".txt").each(function() {
		if (!isNaN(this.value) && this.value.length != 0) {
			sum += parseInt(this.value);
			$(this).css("border-color", "red");
			window.alert('لطفن حروف وارید کنید');
		} else {
			$(this).css("border-color", "#d9d9d9");
		}
	});
}
