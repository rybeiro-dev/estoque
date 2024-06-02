@csrf
<link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>

<table id="example" class="display" style="width:100%">
    <thead>
        <tr>
            <th>id</th>
            <th>description</th>
            <th>brand</th>
            <th>product_model</th>
            <th>department</th>
            <th>group</th>
            <th>price</th>
            <th>status</th>
        </tr>
    </thead>
</table>

<script>
    token = $("input[name=_token]").val();

    $('#example').DataTable( {
        serverSide: true,
        processing: true,
        ajax: {
            url: '/data_tables',
            type: 'POST',
            data: {
                "_token": token
            },
        },
        columns: [
        { data: 'id' },
        { data: 'description' },
        { data: 'brand' },
        { data: 'product_model' },
        { data: 'department', orderable: false},
        { data: 'group', orderable: false },
        { data: 'price' },
        { data: 'status' },
    ],
    } );
</script>
