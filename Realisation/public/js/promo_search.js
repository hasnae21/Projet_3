$('#searchbypromoname').on('keyup',function(){

    $value=$(this).val();
    $.ajax({

    type : 'get',
    url : '/promotion/search',
    data:{'key':$value},
    
    success:function(data){
    $('#tbody').html(data);
    }
    });
    })