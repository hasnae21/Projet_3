$('#searchbyappname').on('keyup',function(){

    $value=$(this).val();
    $.ajax({

    type : 'get',
    url : "{{route('assign.search')}}",
    data:{'key':$value},

    success:function(data){
    $('#tbody').html(data);
    }
    });
    })
