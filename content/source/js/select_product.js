function add_product(data)
{

    $.post("./content/modules/return_product.php",
	{
		product_id: data.value
	},
	function(result){
		product_data = $.parseJSON(result);

        $("#product_id_container").val(product_data.product_dimension);
        $("#product_ifsc_container").val(product_data.product_ifsc);
		$("#product_fpi_container").val(product_data.product_fpi);
		$("#product_type_container").val(product_data.product_type);
        $("#product_price_container").val(product_data.product_price);

        $("#product_qty_container").focus();

        });
}

