jQuery(document).ready(function($) {
	// default value for donation qty
	$("#input_3_16_1").val('1');
	// autofill payment amount on "other" donation change
	$("#input_3_5_other").attr("type", "number");
	$("#input_3_5_other").attr("placeholder", "$ Other Amount");
	$("#input_3_5_other").on("change", function() {
		var value = $(this).val();
		$("#input_3_16").html(value);
		$("#ginput_base_price_3_16").val(value);
	})
});