@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<div class="container py-5">
    <div class="table-actions-wrapper" style="width: 100%; display: block !important;">
    </div>
    <table id="wines_table" class="display my-5">
        <thead>
        <tr>
            <th>Title</th>
            <th>Price</th>
            <th>Year</th>
            <th>Available on</th>
            <th>Available</th>
        </tr>
        </thead>
        <tbody></tbody>
    </table>
</div>
<script>

    $(document).ready( function () {
        $('#wines_table').DataTable({
            "ajax": {
                "url": "/wine/listing",
                "method": "GET",
                "dataFilter": function(response){
                    let data = jQuery.parseJSON( response );
                    data.recordsTotal = data.total;
                    data.recordsFiltered = data.total;
                    data.data = data.items;
                    return JSON.stringify(data);
                },
                "timeout": 0
            },
            "order": [[ 3, 'desc' ]],
            "columns": [
                { "data": function (row) {
                        return row.title;
                    }, 'name': "title" },
                { "data": function (row) {
                        return row.price;
                    }, 'name': "price" },
                { "data": function (row) {
                        return row.year;
                    }, 'name': "year" },
                { "data": function (row) {
                        return row.available_on;
                    }, 'name': "available_on" },
                { "data": function (row) {
                        let html = '';

                        if(row.is_available) {
                            html += `
                        <td class="text-center bg-success text-white">
                            <i class="fas fa-check"></i>
                        </td>
                        `;
                        } else {
                            html += `
                        <td class="text-center bg-danger text-white">
                            <i class="fas fa-times"></i>
                        </td>
                        `;
                        }

                        return html;
                    }, 'name': "available_on" },
            ],
            "columnDefs": [
                {
                    "targets": 0,
                    "orderable": false
                },
                {
                    "targets": 4,
                    "orderable": false
                },
            ],
        });
    } );
</script>
@endsection