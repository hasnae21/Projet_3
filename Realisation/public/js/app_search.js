$('#searchbyappname').on('keyup',function(){

    $value=$(this).val();
    $.ajax({

    type : 'get',
    url : '/apprenant/search',
    data:{'key':$value},
    
    success:function(data){
    $('#tbody').html(data);
    }
    });
    })