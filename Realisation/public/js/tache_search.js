$('#searchbybriefname').on('keyup',function(){

    $value=$(this).val();
    $.ajax({

    type : 'get',
    url : '/brief/search',
    data:{'key':$value},
    
    success:function(data){
    $('#tbody').html(data);
    }
    });
    })