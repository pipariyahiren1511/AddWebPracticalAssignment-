@extends('layouts.app')
@section("title", "Students") 
@section("content")
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5>Student</h5>
                    <ul>
                        <li>
                            <a href="{{ url('student/create')}}" style="text-decoration: none; color:unset;">
                                Create
                            </a>
                        </li>
                        <li>
                            <a class="refresh-link" id="refreshDataTable" style="cursor: pointer;">
                                Refresh data
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover" id="studentTable">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Grade</th>
                            <th>Birth Date</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
@push('script')
<script>
    var dtable;
    $(document).ready(function() {
        dtable = $('#studentTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: 'student/datatable',
            },
            columns: [
                {
                    data: 'id',
                    name: 'id'
                },
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'grade',
                    name: 'grade',
                    "render": function(data) {
                        return data.toUpperCase();
                    }
                },
                {
                    data: 'birth_date',
                    name: 'birth_date'
                },
                {
                    data: 'image',
                    name: 'image',
                    "orderable": false,
                    "searchable": false,
                    "render": function(data) {
                        var element =  
                        `<div class="justify-content-center">
                                <img src="${data}" class="img-thumbnail" alt="Image">
                        </div>`;
                        return element;
                    }
                },
                {
                    "data": null,
                    "name": "action",
                    "orderable": false,
                    "searchable": false,
                    "render": function(o) {
                        var element =  "<a href='{{url('student/')}}/" + o.id +
                            "/edit' >Edit</a>&nbsp; <a href='javascript:void(0);" + o.id + "'  onclick='deleteForm(" + o.id + ")'>Delete</a>";
                        return element;
                    }
                }
            ]
        });
    });

    $("#refreshDataTable").click(function(e) {
        dtable.draw();
    });

    function deleteForm(id) {
        if (confirm("Are You sure want to delete student!")) {
            $.ajax({
                url: "student/" + id,
                type: "DELETE",
                processData: false,
                cache: false,
                contentType: false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(success) {
                alert('Student successfully deleted')
                dtable.draw(false);
                },
                error: function(error) {
                    alert('Something went wrong')
                    dtable.draw(false);
                },
            });
        }
    }
</script>
@endpush