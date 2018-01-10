@extends('app')

@section('scripts')

@stop

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Edit Student</div>

                <div class="panel-body">
                    <form method="post" action="{{{route('edit-student-post')}}}">
                        <p>
                            <button class="btn btn-info">Save</button>
                        </p>
                        <div>
                            <ul style="margin:0;padding:0;list-style:none;">
                                <li>
                                    <label for="first_name"><strong>First Name</strong></label>
                                    <input value="{{{$student->first_name}}}" type="text" name="first_name" class="form-control">
                                </li>
                                <li>
                                    <label for="last_name"><strong>Last Name</strong></label>
                                    <input value="{{{$student->last_name}}}" type="text" name="last_name" class="form-control">
                                </li>
                                <li>
                                    <label for="student_id"><strong>Student ID</strong></label>
                                    <input
                                    @if($student->id)
                                    readonly
                                    @endif
                                     value="{{{$student->student_id}}}" type="text" name="student_id" class="form-control">
                                </li>
                                <li>
                                    <label for="dob"><strong>Date of Birth</strong></label>
                                    <input value="{{{$student->dob}}}" type="text" name="dob" class="form-control">
                                </li> 
                                <li>
                                    <label for="gpa"><strong>Student GPA</strong></label>
                                    <input value="{{{$student->gpa}}}" type="text" name="gpa" class="form-control">
                                </li>  
                            </ul>
                        </div>
                        <br>
                        <p>
                            <button class="btn btn-info">Save</button>
                        </p>
                        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                        <input type="hidden" value="{{{$student->id}}}" name="id"/>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
