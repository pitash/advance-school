              <input type="hidden" value="{{$class_id}}" name="class_id">
              <input type="hidden" value="{{$section_id}}" name="section_id">
              <input type="hidden" value="{{$date}}" name="date">
              <table class="table table-hover table-responsive table-bordered">
                	<thead>
                  <th>#</th>
                  <th>Photo</th>
                  <th>Name</th>
                  <th>Roll</th>
                  <th> <input type="checkbox" onclick="present_all();" id="basic_checkbox_3" >Present/Absent</th>
                  <th> <input type="checkbox" onclick="late_all();" id="basic_checkbox_4" >Late</th>
                </thead>
                <tbody>

                <?php    $l=1; ?>
               @foreach($students as $ss)

                <tr>
				  <td>{{$l++}}</td>
				  <td><img class="img-responsive" width="30" height="30" src="{{asset('public/images/student/'.$ss->student_image)}}" alt="Student Image"></td>
				  <td>{{$ss->student_name}}</td>
				  <td>{{$ss->class_roll}}</td>
				  <td><input type="checkbox" class="present" onclick="present_student({{$ss->id}});" name="present[{{$ss->id}}]" id="basic_checkbox_3" ></td>
				  <td><input type="checkbox" class="late" onclick="late_student({{$ss->id}});" name="late[{{$ss->id}}]" id="basic_checkbox_4" ></td>
				</tr>
        @endforeach

              </tbody>
        <!--       <tfoot>
                <tr>
                    <td colspan="7"><button type="submit" class="btn btn-md btn-info pull-right">Add Attendance</button></td>
                </tr>
              </tfoot> -->

          </table>
              <script type="text/javascript">
//
           $("#basic_checkbox_3").click(function () {
      $(".present").prop('checked', $(this).prop('checked'));
        });
         $("#basic_checkbox_4").click(function () {
    $(".late").prop('checked', $(this).prop('checked'));
      });




          </script>
