window.onload = function() {

  $('#search').on('keyup', function(){
    $value=$(this).val();
    $.ajax({
      type: 'post',
      url: "{{URL::to('overview/search')}}",
      data:{'search':$value},
      success:function(data){
      $('tbody').html(data);
      }
    });
  });

  $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
};
