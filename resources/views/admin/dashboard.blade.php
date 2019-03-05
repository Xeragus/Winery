@extends('layouts.admin')
@section('content')
<div class="container py-5">
    <div class="alert alert-danger" role="alert" style="display: none;"></div>
    <div class="main-wrapper">
        <div class="header mb-5">
            <div class="mb-2"><a href="javascript:;" class="btn btn-primary" id="update_wines_btn">Sync wines data with RSS feed</a></div>
            <span id="last_sync">last synced on {{$lastSync}}</span>
        </div>
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

    $('#update_wines_btn').click(function(e) {
        e.preventDefault();

        $('.alert-danger').empty().hide();

        $('.main-wrapper').hide();

        $.ajax({
            url: '/admin/wines/sync',
            method: 'POST',
            data: {
                "_token": "{{ csrf_token() }}",
            },
            success: function(response) {
                console.log(response);
                if (!response.error) {
                    location.reload();
                } else {
                    $('.alert-danger').append('<span>' + response.message + '</span>').show();
                }
            }
        });
    });
</script>
@endsection