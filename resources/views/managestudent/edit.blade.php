@extends('layouts.app')
@section('content')
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<div class="row">
  <div class="col-md-11">
    <div class="card shadow mb-4">
      <h6 style="    margin: 12px !important" class="m-0 font-weight-bold text-primary fas fa-drafting-compass fa-2x">&nbsp Student Update Form</h6>
      <div class="card-body">
      @if ($errors->any())
        <div class="alert alert-danger">
          <ol>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ol>
        </div>
      @endif
      <form class="well form-horizontal">
         <div class="row">
           <div class="col-md-5">
             <fieldset>
                <div class="form-group">
                   <label class="col-md-4 control-label">Student Name</label>
                   <div class="col-md-8 inputGroupContainer">
                      <div class="input-group"><span class="input-group-addon">
                        <i class="glyphicon glyphicon-user"></i>
                      </span><input id="student_name" name="student_name" placeholder="Enter Student Name" class="form-control" required="true" value="{{ $old_information->student_name }}" type="text">
                    </div>
                   </div>
                </div>
                <div class="form-group">
                  <label class="col-md-4 control-label">Student Photo</label>
                  <div class="col-md-8 inputGroupContainer">
                    <div class="input-group">
                      <span class="input-group-addon" style="max-width: 100%;"><i class="fa fa-upload" aria-hidden="true"></i>
                      </span>
                      <input type="file" class="form-control" name="student_photo">
                    </div>
                  </div>
                </div>
                <div class="form-group">
                   <label class="col-md-4 control-label">Student DOB</label>
                   <div class="col-md-8 inputGroupContainer">
                      <div class="input-group"><span class="input-group-addon"><i class="fa fa-child" aria-hidden="true"></i></span>
                        <input id="dob" name="dob" placeholder="Postal Code/ZIP" class="form-control" required="true" value="{{ $old_information->dob }}" type="date"></div>
                   </div>
                </div>
                <div class="form-group">
                   <label class="col-md-4 control-label">Student Gender</label>
                   <div class="col-md-8 inputGroupContainer">
                      <div class="input-group">
                         <span class="input-group-addon" style="max-width: 100%;"><i class="fa fa-check-square" aria-hidden="true"></i></span>
                         <select class="form-control" name="student_gender">
                           <option value="">-- Select One --</option>
                           <option value="1">Male</option>
                           <option value="2">Female</option>
                         </select>
                      </div>
                   </div>
                </div>
                <div class="form-group">
                   <label class="col-md-4 control-label">Blood Group</label>
                   <div class="col-md-8 inputGroupContainer">
                      <div class="input-group">
                         <span class="input-group-addon" style="max-width: 100%;"><i class="fa fa-heartbeat" aria-hidden="true"></i></span>
                         <select class="form-control" name="blood_group">
                           <option value="">-- Select One --</option>
                           <option value="1">A(+)</option>
                           <option value="1">A(-)</option>
                           <option value="1">B(+)</option>
                           <option value="1">B(+)</option>
                           <option value="1">O(+)</option>
                           <option value="1">O(-)</option>
                         </select>
                      </div>
                   </div>
                </div>
                <div class="form-group">
                   <label class="col-md-4 control-label">Admission Date</label>
                   <div class="col-md-8 inputGroupContainer">
                      <div class="input-group"><span class="input-group-addon">
                        <i class="fa fa-university" aria-hidden="true"></i></i></span>
                        <input id="admission_date" name="admission_date" placeholder="Postal Code/ZIP" class="form-control" required="true" value="{{ $old_information->admission_date }}" type="date"></div>
                   </div>
                </div>
                <div class="form-group">
                   <label class="col-md-4 control-label">Student Phone No</label>
                   <div class="col-md-8 inputGroupContainer">
                      <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
                        <input id="student_phone_no" name="student_phone_no" placeholder="Enter Phone No" class="form-control" required="true" value="{{ $old_information->student_phone_no }}" type="text">
                      </div>
                   </div>
                </div>
                <div class="form-group">
                   <label class="col-md-4 control-label">Class</label>
                   <div class="col-md-8 inputGroupContainer">
                      <div class="input-group"><span class="input-group-addon">
                        <i class="fa fa-universal-access" aria-hidden="true"></i></span>
                        <input id="class" name="class" placeholder="Class Name" class="form-control" required="true" value="{{ $old_information->class }}" type="text"></div>
                   </div>
                </div>
                <div class="form-group">
                   <label class="col-md-4 control-label">Group</label>
                   <div class="col-md-8 inputGroupContainer">
                      <div class="input-group"><span class="input-group-addon">
                        <i class="fa fa-user-plus" aria-hidden="true"></i></span>
                        <input id="group" name="group" placeholder="Class Name" class="form-control" required="true" value="{{ $old_information->group }}" type="text"></div>
                   </div>
                </div>
                <div class="form-group">
                   <label class="col-md-4 control-label">Class Rol</label>
                   <div class="col-md-8 inputGroupContainer">
                      <div class="input-group"><span class="input-group-addon">
                        <i class="fa fa-star" aria-hidden="true"></i></span>
                        <input id="class_roll" name="class_roll" placeholder="Class Rol" class="form-control" required="true" value="{{ $old_information->class_roll }}" type="text"></div>
                   </div>
                </div>
            </fieldset>
           </div>
           <div class="col-md-5">
             <fieldset>
               <div class="form-group">
                  <label class="col-md-4 control-label">Religion</label>
                  <div class="col-md-8 inputGroupContainer">
                     <div class="input-group">
                        <span class="input-group-addon" style="max-width: 100%;"><i class="glyphicon glyphicon-list"></i></span>
                        <select class="form-control" name="religion">
                          <option value="">-- Select One --</option>
                          <option value="1">Muslim</option>
                          <option value="1">Hindu</option>
                        </select>
                     </div>
                  </div>
               </div>
               <div class="form-group">
                  <label class="col-md-4 control-label">Present Address</label>
                  <div class="col-md-8 inputGroupContainer">
                     <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                       <input id="student_present_address" name="student_present_address" placeholder="Enter Present Address" class="form-control" required="true" value="{{ $old_information->student_present_address }}" type="text"></div>
                  </div>
               </div>
               <div class="form-group">
                  <label class="col-md-4 control-label">Parmanet Address</label>
                  <div class="col-md-8 inputGroupContainer">
                     <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                       <input id="student_parmanent_address" name="student_parmanent_address" placeholder="Enter Parmanent Address" class="form-control" required="true" value="{{ $old_information->student_present_address }}" type="text"></div>
                  </div>
               </div>
               <div class="form-group">
                 <label class="col-md-4 control-label">
                   <i class="glyphicon glyphicon-home"></i>
                 </label>
                   <legend>
                     Student Guardian Information
                   </legend>
               </div>
                <div class="form-group">
                   <label class="col-md-4 control-label">Father Name</label>
                   <div class="col-md-8 inputGroupContainer">
                      <div class="input-group"><span class="input-group-addon">
                        <i class="glyphicon glyphicon-user"></i></span>
                        <input id="student_father_name" name="student_father_name" placeholder="Enter Student Father Name" class="form-control" required="true" value="{{ $old_information->student_father_name }}" type="text">
                    </div>
                   </div>
                </div>
                <div class="form-group">
                   <label class="col-md-4 control-label">Mother Name</label>
                   <div class="col-md-8 inputGroupContainer">
                      <div class="input-group"><span class="input-group-addon">
                        <i class="glyphicon glyphicon-user"></i></span>
                        <input id="student_mother_name" name="student_mother_name" placeholder="Enter Student Mother Name" class="form-control" required="true" value="{{ $old_information->student_mother_name }}" type="text">
                    </div>
                   </div>
                </div>
                <div class="form-group">
                   <label class="col-md-4 control-label">Guardian Phone</label>
                   <div class="col-md-8 inputGroupContainer">
                      <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
                        <input id="guardian_phone_no" name="guardian_phone_no" placeholder="Guardian Phone No" class="form-control" required="true" value="{{ $old_information->guardian_phone_no }}" type="text">
                      </div>
                   </div>
                </div>
                <div class="form-group">
                   <label class="col-md-4 control-label">Guardian Email</label>
                   <div class="col-md-8 inputGroupContainer">
                      <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                        <input id="guardian_email" name="guardian_email" placeholder="Guardian Email" class="form-control" required="true" value="{{ $old_information->guardian_email }}" type="text"></div>
                   </div>
                </div>
                <div class="form-group">
                  <label class="col-md-4 control-label">Guardian NID No</label>
                  <div class="col-md-8 inputGroupContainer">
                    <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
                      <input id="guardian_nid_no" name="guardian_nid_no" placeholder="Guardian NID No" class="form-control" required="true" value="{{ $old_information->guardian_nid_no }}" type="text">
                    </div>
                  </div>
                </div>

            </fieldset>
           </div>
         </div>
      </form>
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
  </div>
 </div>
</div>
@endsection
