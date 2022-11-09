$('#searchbypromoname').on('keyup',function(){

    $value=$(this).val();
    $.ajax({

    type : 'get',
    url : 'search',
    data:{'key':$value},
    
    success:function(data){
    $('#tbody').html(data);
    }
    });
    })
