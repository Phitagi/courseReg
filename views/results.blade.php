@extends('layouts.basic')
@section('content')
<div class='showDiv col-md-8' style='margin:0 auto !important;'>
    <div class='row' style="text-align:center;"> 

            <div style="width:100%; display:flex; flex-direction:row; justify-content:space-between;"><h4>{{$student->name}} results</h4>
                <a href="{{URL::to('institute')}}"><button type="submit" class="btn btn-primary btn-sm">Back to students</button></a>
            </div>
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
                    @foreach($results as $result) <?php $i++; ?>
                    <tr>
                        <td> {{ $i }}</td>
                        <td>{{ $result->course_id }}</td>
                        <td>{{ $result->unit }}</td>
                        <td>{{ $result->grade }}</td>
                        <td>{{ $result->date }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

    </div>
</div>
@endsection