<table id="sum_table" width="300" border="1">
    <thead>
    <tr>
        <th>Apple</th>
        <th>Orange</th>
        <th>Watermelon</th>
    </tr>
    </thead>
    <tr>
        <td>1</td>
        <td>2</td>
        <td>3</td>
    </tr>
    <tr>
        <td>1</td>
        <td>2</td>
        <td>3</td>
    </tr>
    <tr>
        <td>1</td>
        <td>2</td>
        <td>3</td>
    </tr>
    <tfoot>
    <tr>
        <td>Total:</td>
        <td>Total:</td>
        <td>Total:</td>
    </tr>
    </tfoot>
</table>

<script language=javascript>

    $('table thead th').each(function(i)
    {
        calculateColumn(i);
    });

    function calculateColumn(index)
    {
        var total = 0;
        $('table tr').each(function()
        {
            var value = parseInt($('td', this).eq(index).text());
            if (!isNaN(value))
            {
                total += value;
            }
        });

        $('table tfoot td').eq(index).text('Total: ' + total);
    }
</script>