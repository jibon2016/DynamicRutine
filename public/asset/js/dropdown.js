
$(document).ready(function(){
  
  $('#department').change(function(){
    if($(this).val() != '')
    {
      // Chang Session Value
      $('#session').html('<option>--- Select ---</option>')
      
      let select =  $(this).attr("id");
      let value = $(this).val();
      let dependent = $(this).data('dependent');
      let _token = $('input[name="_token"]').val();


      $.ajax({
        url: '/dept',
        type:'post',
        data: {
          department: value,
          _token : _token,
          dependent: dependent
        },
        success:function(result){
          $('#'+dependent).html(result);
        }
      })
    }
  });

  
  $('#shift').change(function(){
    if($(this).val() != '')
    {

      let select =  $(this).attr("id");
      let value = $(this).val();
      let dependent = $(this).data('dependent');
      let _token = $('input[name="_token"]').val();
      $.ajax({
        url: '/shift',
        type:'post',
        data: {
          shift : value,
          _token : _token,
          dependent: dependent
        },
        success:function(result){
          $('#'+dependent).html(result);
        }
      })
    }
  });


  
  $('#session').change(function(){
    if($(this).val() != '')
    {
      let select =  $(this).attr("id");
      let value = $(this).val();
      let department = $('#department').val();
      let shift = $('#shift').val();
      let dependent = $(this).data('dependent');
      let _token = $('input[name="_token"]').val();

      console.log(value, department, shift);
      $.ajax({
        url: '/session',
        type:'post',
        data: {
          session : value,
          _token : _token,
          department : department,
          shift : shift,
          dependent: dependent
        },
        success:function(result){
          console.log(result.batch);
          let batch_html = "";
          let teacher_html = "";
          let class_html = "";
          let lab_html = "";
          let batch = result.batch;
          let teacher = result.teacher;
          let classRoom = result.class;
          let lab = result.lab;

          for (let e in batch){
            let active_status = batch[e].active_status === 1 ? "checked":"";
            batch_html += '<label class="checkbox-inline mx-2"><input class="mx-1" name="batch[]" value="'+batch[e].name +'" id="inlineCheckbox1" '+ active_status + ' type="checkbox" value="option1">'+ batch[e].name  + '</label>';
          };
          for (let e in teacher){
            let active_status = teacher[e].active_status === 1 ? "checked":"";
            teacher_html += '<label class="checkbox-inline mx-2"><input class="mx-1"  name="teacher[]" value="'+teacher[e].name +'" id="inlineCheckbox1"'+ active_status +' type="checkbox" value="option1">'+ teacher[e].name  + '</label>';
          };
          for (let e in classRoom){
            let active_status = classRoom[e].active_status === 1 ? "checked":"";
            class_html += '<label class="checkbox-inline mx-2"><input class="mx-1" name="classRoom[]" value="'+classRoom[e].room_no +'" id="inlineCheckbox1"'+ active_status +' type="checkbox" value="option1">'+ classRoom[e].room_no  + '</label>';
          };
          for (let e in lab){
            let active_status = lab[e].active_status === 1 ? "checked":"";
            lab_html += '<label class="checkbox-inline mx-2"><input class="mx-1" name="lab[]" value="'+lab[e].room_no +'" id="inlineCheckbox1"'+ active_status +' type="checkbox" value="option1">'+ lab[e].room_no  + '</label>';
          };
          console.log(batch_html);
          $('#'+dependent).html(batch_html);
          $('#teacher').html(teacher_html);
          $('#class').html(class_html);
          $('#lab').html(lab_html);
        }
      })
    }
  })


  $('#logincheckbox').click(function(){
    if($(this).prop("checked") == true){
      $('#loginDetails').removeClass('d-none').addClass('d-block');
    }
    else if($(this).prop("checked") == false){
      $('#loginDetails').removeClass('d-block').addClass('d-none');
    }
  });




  // $('#v-pills-tab').click(function(el){
  //   var triggerTabList = document.querySelector('#myTab .active').innerHTML;
  //   // var tabListContent = document.querySelector('#v-pills-tabContent');
  //   var semister = triggerTabList.slice(0, 4).trim();
  //   let dept = document.querySelector('#dept').innerHTML;
  //   let _token =$('meta[name="csrf-token"]').attr('content');
  //   var array = [];

  //   // tabListContent.innerHTML = '<div class="tab-pane fade show active" id="v-pills-1st" role="tabpanel" aria-labelledby="v-pills-home-tab"><input type="checkbox"  class="mx-1"><label for="">From Js</label></div>';

  //   $.ajax({
  //       url: '/sub_add_tea',
  //       type:'post',
  //       data: {
  //         semister : semister,
  //         dept     : dept,
  //         _token  : _token
  //       },
  //       success:function(result){
  //         let subject = result.subject;
  //         let subject_html  = '';
          
  //         if (!subject.length == 0) {
  //           for(let e in subject)
  //           {
  //               // let active_status = subject[e].active_status === 1 ? "checked":"";
  //               subject_html += '<div class="tab-pane fade show active" id="v-pills-1st" role="tabpanel" aria-labelledby="v-pills-home-tab"><label><input type="checkbox" value='+ subject[e].id +' class="mx-1">' + subject[e].course_name + '</label></div>';
  //           }
  //         }else{
  //           subject_html = "<p>No Class in this Semister</p>";
  //         }

  //         $('#v-pills-tabContent').html(subject_html);

  //         $('#v-pills-tabContent').click(function() {
  //             $('#v-pills-tabContent :checked').each(function() {
  //               // if(values.indexOf($(this).val()) === -1){
                  
  //                 values.push($(this).val());
  //               // }
  //             });
  //             console.log(values); 
  //         });

            
  //       }//Success end
          
  //     })//Ajax end

  // });//Tab click end




});


  var logincheckbox = document.getElementById("logincheckbox");  
  if (logincheckbox.checked == true){  
    console.log('checked');
  }   