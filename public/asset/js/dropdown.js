
$(document).ready(function(){
  
  $('#department').change(function(){
    if($(this).val() != '')
    {
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
          let html = "";
          let batch = result.batch;
          for (let e in batch){
            html += '<label class="checkbox-inline mx-2"><input class="mx-1" id="inlineCheckbox1"'+ batch[e].active_status +' type="checkbox" value="option1">'+ batch[e].name  + '</label>';
          };
          console.log(html);
          $('#'+dependent).html(html);
        }
      })
    }
  });

});