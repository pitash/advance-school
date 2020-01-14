@extends('layouts.app')
@section('content')
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <!------ Include the above in your HEAD tag ---------->

  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
  <div class="container">
  	<div class="row justify-content-center">
  		<div class="col-12 col-md-8 col-lg-6 pb-5">
          <!--Form with header-->
          <form action="{{ route('academicsubject.update', $old_information->id) }}" method="post">
            @csrf
            @method('PUT')
              <div class="card border-primary rounded-0">
                <div class="card-header p-0">
                  <div class="bg-info text-white text-center py-2">
                    <h3><i class="fa fa-envelope"></i>&nbsp Subject Name</h3>
                  </div>
                  </div>
                  <div class="card-body p-3">
                      <!--Body-->
                    <div class="form-group">
                      <div class="input-group mb-2">
                        <div class="input-group-prepend">
                          <div class="input-group-text"><i class="fa fa-comment text-info"></i></div>
                          </div>
                         <input type="text" class="form-control" id="subject_name" name="subject_name" placeholder="Enter Subject Name" value="{{ $old_information->subject_name }}" required>
                         <input type="hidden" class="form-control" id="subject_id" aria-describedby="emailHelp" name="subject_id" value="{{ $old_information->id }}">
                        </div>
                      </div>
                      <div class="text-center">
                        <button type="submit" class="btn btn-info btn-block rounded-0 py-2">Update</button>
                      </div>
                  </div>
              </div>
          </form>
          <!--Form with header-->
      </div>
  	</div>
  </div>
@endsection
