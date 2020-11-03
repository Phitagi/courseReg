
@extends('layouts.basic')
@section('content')
<?php use app\Models\Course; ?>
<div class='modal fade' id='regCourseModal' role='dialog'>
			<div class='modal-dialog'>
			
			<!-- Modal content-->
			<div class='modal-content'>
				<div class='modal-header'>
					<button type='button' class='close' data-dismiss='modal'>&times;</button>
				</div>
				<div class='modal-body'>
                    @if(Session::has('lec'))
                    <form method="POST" action="{{{ URL::to('results') }}}" accept-charset="UTF-8">
                        @csrf
                        <div class="form-group">
                            <label for="username">Student</label>
                            <select class="form-control" name="studentId">
                                @foreach($students as $student)
                                    <option value="{{$student->id}}">{{$student->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="username">Course</label>
                            <select class="form-control" name="courseId">
                                @foreach($courses as $course)
                                    <option value="{{$course->id}}">{{$course->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-actions form-group">
                            <label> Unit </label><br>
                            <input type='text' class="form-control" value="" name='unit'>
                        </div>
                        <div class="form-actions form-group">
                            <label> Grade </label><br>
                            <input type='text' class="form-control" value="" name='grade'>
                        </div>
                        <div class="form-actions form-group">
                            <button type="submit" class="btn btn-primary btn-sm">Submit</button> 
                        </div>
                    </form>
                    @elseif(Session::has('student'))
                        <form method="POST" action="{{{ URL::to('regs') }}}" accept-charset="UTF-8">
                            @csrf
                            <div class="form-group">
                                <label for="username">Course</label>
                                <select class="form-control" name="courseId">
                                    @foreach($courses as $course)
                                    <option value="{{$course->id}}">{{$course->name}}</option>
                                    @endforeach
                                </select>
                                <input type='hidden' value="{{Session::get('student')->id}}" name='studId'>
                            </div>
                            <div class="form-actions form-group">
                                <button type="submit" class="btn btn-primary btn-sm">Apply</button> 
                            </div>
                        </form>
                    @endif

				</div>
				<div class='modal-footer'>
					<button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
				</div>
			</div>
			
			</div>
		</div>
                                    <!--endCourseRegistrationmODAL-->

                                    <!--RESULTSmODAL-->

        <div class='modal fade' id='resultsModal' role='dialog'>
			<div class='modal-dialog'>
			<!-- Modal content-->
			<div class='modal-content'>
				<div class='modal-header'>
					<button type='button' class='close' data-dismiss='modal'>&times;</button>
				</div>
				<div class='modal-body'>
                    <table id="users" class="table table-bordered" style='margin-top:10px;'>
                        <thead>
                            <th>#</th>
                            <th>Course</th>
                            <th>Unit</th>
                            <th>Grade</th>
                            <th>Date</th>
                        </thead>
                        <tbody>
                            <?php $i = 0; ?>
                            @if(Session::has('student'))
                                @foreach($results as $result)
                                <tr>
                                    <td> {{ $i }}</td>
                                    <td>{{ $result->course_id}}</td>
                                    <td>{{ $result->unit }}</td>
                                    <td>{{ $result->grade }}</td>
                                    <td>{{ $result->date }}</td>
                                </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
				</div>
				<div class='modal-footer'>
					<button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
				</div>
			</div>
			
			</div>
		</div>


                                        <!--endRESULTSmODAL-->



<div class='showDiv col-md-8' style='margin:0 auto !important;'>
    @if(Session::has('lec') || Session::has('student')) <!--if loggedIn-->

    <div class='row' style="text-align:center;"> 

        @if(Session::has('lec'))   <!--if its a lecturer loggedIn-->


            <div style='text-align:center; width:100%;'> Hello {{Session::get('lec')->name}} </div><br>
            <div style="width:100%; display:flex; flex-direction:row; justify-content:space-between;"><h4>Students</h4>
                <button type="submit" class="btn btn-primary btn-sm" data-toggle='modal' data-target='#regCourseModal'>Add result</button></a>
            </div>
            <table id="users" class="table table-bordered" style='margin-top:10px;'>
                <thead>
                    <th>#</th>
                    <th>Student</th>
                    <th>Check</th>
                </thead>
                <tbody>
                    <?php $i = 0; ?>
                    @foreach($students as $student) <?php $i++; ?>
                    <tr>
                        <td> {{ $i }}</td>
                        <td>{{ $student->name }}</td>
                        <td><a href="{{URL::to('results/'.$student->id)}}"><button type="submit" class="btn btn-primary btn-sm">Check results</button></a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>


        @else              <!--if student loggedIn-->



            <div style='text-align:center; width:100%; margin-bottom:10px;'> Hello {{Session::get('student')->name}} </div>
            <div style="width:100%; display:flex; flex-direction:row; justify-content:space-between;"><h4>Courses applied</h4>
                <button type="submit" class="btn btn-primary btn-sm" data-toggle='modal' data-target='#regCourseModal'>Apply</button>
                <button type="submit" class="btn btn-primary btn-sm" data-toggle='modal' data-target='#resultsModal'>Results</button>
            </div>
            <table id="users" class="table table-bordered" style='margin-top:10px;'>
                <thead>
                    <th>#</th>
                    <th>Course</th>
                    <th>Date</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    <?php $i = 0; ?>
                    @foreach($regs as $reg) <?php $i++; ?>
                    <tr>
                        <td> {{ $i }}</td>
                        <td>{{ $reg->course_id }}</td>
                        <td>{{ $reg->created_at }}</td>
                        <td><a href="{{URL::to('reg/delete/'.$reg->id)}}">Remove</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
            </div>
    @else                           <!--if NotLoggedIn-->

    <div>Logged out</div>
        <form method="POST" action="{{{ URL::to('login') }}}" accept-charset="UTF-8">
        @csrf
            <div class="form-group">
                <label for="username">Username</label>
                <input class="form-control" placeholder="" type="text" name="name" id="name" required>
            </div>
            <div class="form-group">
                <label for="username">User type</label>
                <select class="form-control" name="userType">
                    <option >Student</option>
                    <option >Lecturer</option>
                </select>
            </div>
            <div class="form-group">
                <label for="username">Password</label>
                <input class="form-control" placeholder="" type="password" name="password" id="code" required>
            </div>
            <div class="form-actions form-group">
                <button type="submit" class="btn btn-primary btn-sm">Log in</button> 
            </div>
        </form>
    </div>
    @endif
@endsection