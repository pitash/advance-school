
              <table class="table table-hover table-responsive table-bordered">
                	<thead>
                  <th>#</th>
                  <th>Name</th>
                  <th>Roll</th>
                  <th>Date</th>
                  <th>Date</th>
                  <th>Date</th>
                  <th>Date</th>
                  <th>Date</th>
                  <th>Date</th>
                  <th>Date</th>
                  <th>Percentage %</th>

                </thead>
                <tbody>
<?php $a=1; ?>
@foreach($students as $std)
<tr>
  <td>{{ $a++ }}</td>
<td>{{ $std->student_name }}</td>
<td>{{ $std->class_roll }}</td>
<?php $att=DB::table('attendance_creates')->where('student_id',$std->id)->get(); ?>
@foreach($att as $at)
<td>
  <span>{{ $at->date }}</span><br>
@if($at->present==1)
  <span>Present</span>
@else
  <span>Absent</span>
@endif
</td>

@endforeach


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
