<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Data Table</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Data Table</h1>
            </div>
            <div class="col-12 form-group">
                <input type="search" name="search" id="search" class="form-control"/>
                <button class="btn btn-primary my-3" id="searchBtn">Search</button>
            </div>
            <div class="col-12 mx-auto">
                <table id="datatable" class="table" style="width:100%">
                    <thead class="table-light">
                        <tr>
                            <td>Name</td>
                            <td>Email</td>
                            <td>Remeber Token</td>
                            <td>Created At</td>
                            <td>Action</td>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    {{-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> --}}

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap4.min.js"></script>


    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('#datatable').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: `{{route("users.listJson")}}`,
                    type: "POST",
                    data: function(data){
                        data.cSearch = $("#search").val();
                    }
                },
                pageLength: 10,
                searching: false,
                columns: [
                    {
                        data: 'name'
                    },
                    {
                        data: 'email'
                    },
                    {
                        data: 'remember_token'
                    },
                    {
                        data: 'created_at'
                    },
                    {
                        data: 'id',
                        bSortable: false,
                        render: function(data, type, row) {
                            return `<a href="${row.id}">View</a>`
                        }
                    },
                ],
            });

            $("#searchBtn").click(() => {
                $('#datatable').DataTable().ajax.reload();
            })
        });
    </script>
</body>

</html>
