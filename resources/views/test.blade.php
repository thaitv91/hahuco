@extends('layouts.admin')
@section('styles')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/rowreorder/1.2.3/css/rowReorder.dataTables.min.css">
@endsection
@section('content')
<table id="example" class="display" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th>Order</th>
            <th>Title</th>
            <th>Type</th>
            <th>Slug</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($data as $key => $value): ?>
            <tr>
                <td>{{ $key+1 }}</td>
                <td>{{ $value->title }}</td>
                <td>{{ $value->type }}</td>
                <td>{{ $value->slug }}</td>
            </tr>
        <?php endforeach ?>
    </tbody>
    <tfoot>
        <tr>
            <th>Order</th>
            <th>Title</th>
            <th>Type</th>
            <th>Slug</th>
        </tr>
    </tfoot>
</table>
@endsection

@section('scripts')
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/rowreorder/1.2.3/js/dataTables.rowReorder.min.js"></script>
<script type="text/javascript">
    var editor; // use a global for the submit and return data rendering in the examples
    $(document).ready(function() {
        $.ajaxSetup({
           headers: {'X-CSRF-TOKEN': $("meta[name='csrf-token']").attr('content')}
       });
        
        var table = $('#example').DataTable( {
            rowReorder: true
        } );
        table.on( 'row-reorder', function ( e, diff, edit ) {
            var order = [];
            var data = $('#example tbody tr');
            for (var i = 0; i < data.length; i++) {
                var item = $(data[i]).find('td')[3];
                order.push($(item).text());
            }            
            
            updateOrder(order);
        } );

        function updateOrder(order) {
            $.ajax({
                type : "POST",
                url : "{{ route('admin.template.updateOrder') }}",
                data : {order : order}
            });
        }
    } );
</script>
@endsection