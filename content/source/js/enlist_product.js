

function static_counter() {

    if( typeof static_counter.counter == 'undefined' ) {
        static_counter.counter = 0;
    }
    static_counter.counter++;
    return static_counter.counter;
}



function enlist_product(data)
{
    var product = document.getElementById("product_id_container").value;
    var price = document.getElementById("product_price_container").value;
    var ifsc = document.getElementById("product_ifsc_container").value;
    var quantity = document.getElementById("product_qty_container").value;
    var counter = static_counter();
    var element = document.getElementById("default_row ");

    if(typeof(element) != 'undefined' && element != null) {
        var parent = document.getElementById("product_table_body");
        var child = document.getElementById("default_row ");
        parent.removeChild(child);
    }

    var total = price * quantity;
    var qty_id = 'quantity_' + counter;
    var total_id = 'total_' + counter;
    var row = "<tr >" +
        "<th >"+ counter +"</th>" +
        "<td >"+ product +"</td>" +
        "<td >"+ ifsc +"</td>" +
        "<td >"+ price +"</td>" +
        "<td class='qty_countable'>"+ quantity +"</td>" +
        "<td class='countable'>"+ total +"</td>" +
        "</tr>";

    $("#product_table_body").append(row);

    update_footer(total,quantity);



    document.getElementById("product_id_container").value = "";
    document.getElementById("product_price_container").value = "";
    document.getElementById("product_ifsc_container").value = "";
    document.getElementById("product_qty_container").value = "";
    document.getElementById("product_fpi_container").value = "";
    document.getElementById("product_type_container").value = "";

}

function generate_footer(total,qty)
{


}

function update_footer(total,qty)
{
    var old_row = document.getElementById("footer_row");
    if(typeof (old_row) != 'undefined' && old_row != null)
    {
        var old_row = document.getElementById("footer_row");
        old_row.parentNode.removeChild(old_row);
    }


    var cls = document.getElementById("invoice_item_table").getElementsByTagName("td");
    var sum = 0;
    var qty = 0;
    for (var i = 0; i < cls.length; i++){
        if(cls[i].className == "countable"){
            sum += isNaN(cls[i].innerHTML) ? 0 : parseInt(cls[i].innerHTML);
        }
        if(cls[i].className == "qty_countable"){
            qty += isNaN(cls[i].innerHTML) ? 0 : parseInt(cls[i].innerHTML);
        }
    }

    var table = document.getElementById("invoice_item_table");
    var row = table.insertRow(-1);
    row.setAttribute("id","footer_row");
    row.setAttribute("class","border-top font-weight-bold");

    var cell_1 = row.insertCell();
    var cell_2 = row.insertCell();
    var cell_3 = row.insertCell();
    var cell_4 = row.insertCell();
    var qty_cell = row.insertCell();
    var total_cell = row.insertCell();


    total_cell.innerHTML = sum;
    qty_cell.innerHTML =qty;


}

function count_total(total,qty)
{



}