@extends('app')

@section('scripts')
<script type="text/javascript">
    jQuery(function(){
        // alert("foo");
    });
</script>

@stop

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Students</div>

                <div class="panel-body">
                    <a href="/edit-student" class="btn btn-info">Add New Student</a>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Student ID</th>
                                <th>Date of Birth</th>
                                <th>&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($students as $student); ?>
                                <tr>
                                    <td>{{{$student->first_name}}}</td>
                                    <td>{{{$student->last_name}}}</td>
                                    <td>{{{$student->student_id}}}</td>
                                    <td>{{{$student->dob}}}</td>
                                    <td><a href="/edit-student/{{$student->id}}" class="btn btn-info">Edit Student</a></td>
                                </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
