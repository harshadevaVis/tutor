@extends('layouts.main')
@section('customLinks')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.20/af-2.3.4/b-1.6.1/b-colvis-1.6.1/b-flash-1.6.1/b-html5-1.6.1/b-print-1.6.1/cr-1.5.2/fc-3.3.0/fh-3.1.6/kt-2.5.1/r-2.2.3/rg-1.1.1/rr-1.2.6/sc-2.0.1/sp-1.0.1/sl-1.3.1/datatables.min.css"/>
    {{--<link rel="stylesheet" type="text/css" href="{{ \Illuminate\Support\Facades\URL::asset('my_assets/js/sweet-alert2/sweetalert2.min.css')}}">--}}

@endsection
@section('pageSpecificContent')

    <div class="container">
        <div class="card m-b-20">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-rep-plugin">
                            <div class="table-responsive b-0" data-pattern="priority-columns">
                                <table class="table table-striped table-bordered" id="commentTable"
                                       cellspacing="0"
                                       width="100%">
                                    <thead>
                                    <tr>
                                        <th>TEACHER NAME</th>
                                        <th>COMMENTER</th>
                                        <th width="70%">COMMENT</th>
                                        <th>STATUS</th>
                                        <th>ACTION</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
@section('customScript')
    {{--<link rel="stylesheet" type="text/css" href="{{ \Illuminate\Support\Facades\URL::asset('my_assets/js/sweet-alert2/sweetalert2.min.js')}}">--}}


    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.20/af-2.3.4/b-1.6.1/b-colvis-1.6.1/b-flash-1.6.1/b-html5-1.6.1/b-print-1.6.1/cr-1.5.2/fc-3.3.0/fh-3.1.6/kt-2.5.1/r-2.2.3/rg-1.1.1/rr-1.2.6/sc-2.0.1/sp-1.0.1/sl-1.3.1/datatables.min.js"></script>


    <script type="text/javascript">

        let table;
        $(document).ready(function () {
//
        table =  $('#commentTable').DataTable( {
                responsive: true,
                "bFilter": true,
                'bInfo': false,
                "lengthMenu": [ [10, 25, 50, -1], ['10 rows', '25 rows', '50 rows', "All rows"] ],
                dom: 'Bfrtip',
                'order': [[ 0, 'desc' ]],
                "bPaginate": true,
                processing:true,
                serverSide:true,
                ajax: {
                    dataType:'JSON',
                    type: "POST",
                    url:"{{route('adminViewComments')}}"
                },
                columns:[
                    {
                        data:'teacher'
                    },
                    {
                        data:'commenter',
                        orderable: false,
                        render: function (data, type, row) {
                            return '<p>Name : ' + data[0] +'</p><p>Email : ' + data[1] +'</p>';
                        }
                    },
                    {
                        data:'comment'
                    },
                    {
                        data:'status'
                    },
                    {
                        data:'action'
                    },

                ],
                buttons: [

                    {
                        extend:'print',
                        title: 'Comment Table',
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'excelHtml5',
                        autoFilter: true,
                        sheetName: 'Comment Table',
                        filename: 'Comment Table',
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'pdfHtml5',
                        orientation: 'landscape',
                        pageSize: 'LEGAL',
                        filename: 'Comment Table',
                        title:'Comment Table',
                        exportOptions: {
                            columns: ':visible'
                        }


                    },
                    {
                        extend: 'colvis',
                        text: 'Columns'
                    },
                    'pageLength'

                ]
            } );
        } );

        function deleteComment(id) {

            Swal.fire({
                title: 'Are you sure?',
                text: 'You will not be able to recover this process!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Delete it!',
                cancelButtonText: 'Keep it!'
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        type: 'POST',
                        data: {id: id},
                        url: "{{ route('deleteComment') }}",
                        success: function () {
                            Swal.fire(
                                'Deleted!',
                                'Selected comment has been deleted.',
                                'success'
                            )
                            table.ajax.reload()

                        }
                    });
                } else if (result.dismiss === Swal.DismissReason.cancel) {
                    return false;
                }
            });
        }

        function unApproveComment(id) {

            Swal.fire({
                title: 'Unpublish?',
                text: 'This will change comment status to unpolished and comment will no longer appear on user comment sections!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Reject!',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        type: 'POST',
                        data: {id: id},
                        url: "{{ route('unApproveComment') }}",
                        success: function () {
                            Swal.fire(
                                'Done!',
                                'Selected comment has been unpolished.',
                                'success'
                            );
                            table.ajax.reload()

                        }
                    });

                } else if (result.dismiss === Swal.DismissReason.cancel) {
                    return false;
                }
            });
        }

        function approveComment(id) {

            Swal.fire({
                title: 'Are you sure?',
                text: 'Selected comment will be public and will be display on teacher\'s review sections!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Approve!',
                cancelButtonText: 'Cancel!'
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        type: 'POST',
                        data: {id: id},
                        url: "{{ route('approveComment') }}",
                        success: function () {
                            Swal.fire(
                                'Approved!',
                                'Selected comment has been approved.',
                                'success'
                            )
                            table.ajax.reload()

                        }
                    });
                } else if (result.dismiss === Swal.DismissReason.cancel) {
                    return false;
                }
            });
        }


</script>
@endsection
