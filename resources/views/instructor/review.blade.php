@extends('layouts.backend.index')
@section('content')
<body style="">
    <div class="container">
        <h2 style="text-align: center;">Review Question</strong></h2>
  		@foreach($question as $quest)
            <div class="">
                <form method="get" action="{{route('instructor.question.edit',$quest->id)}}" class="ansform">
                	{{ csrf_field() }}
                    <div class="">
                    	<input type="hidden" name="questionId" id="question" value="{{$quest->id}}">

                        <input type="hidden" name="true_answer"  value="{{$quest->answer}}">

                        <table class="table bg-success">
                          <tbody>
                            <div class="form-group">
                            <tr class="danger">
                              <td><strong>Question : </strong></td>
                              <td><input type="text" class="form-control" name="question" value="{{$quest->question}}" readonly></td>

                            </tr>
                            </div>

                            <div class="form-group">
                            <tr class="bg-success">
                              <td><strong>Choice1 : </strong></td>
                              <td><input name="choice1" class="form-control"  value="{{$quest->choice1}}" type="text" readonly></td>
                            </tr>
                          </div>

                          <div class="form-group">
                            <tr class="danger">
                              <td><strong>Choice2 : </strong></td>
                              <td><input name="choice2" class="form-control" value="{{$quest->choice2}}" type="text" readonly></td>
                            </tr>
                          </div>

                          <div class="form-group">
                            <tr class="bg-success">
                              <td><strong>Choice3 : </strong></td>
                              <td><input name="choice3" class="form-control" value="{{$quest->choice3}}" type="text" readonly></td>
                            </tr>
                          </div>

                          <div class="form-group">
                            <tr class="warning">
                              <td><strong>Choice4 : </strong></td>
                              <td><input name="choice4" class="form-control" value="{{$quest->choice4}}" type="text" readonly></td>
                            </tr>
                          </div>

                          <div class="form-group">
                            <tr class="bg-success">
                              <td><strong>Answer : </strong></td>
                              <td><input name="answer" class="form-control" value="{{$quest->answer}}" type="text" readonly></td>
                            </tr>
                          </div>
                          </tbody>
                        </table>
                    </div>
                    <button type="submit" name="submitFromEditPage" class="btn btn-warning btn-md edit_data  btn-lg align-center btn-block">Edit</button>
                 </form>
            </div><br>
         @endforeach






<a href="{{route('instructor.course.list')}}"><button type="button" name="ReviewDone" class="btn btn-primary btn-block">Review Done</button></a><br><br>

</body>




@endsection
