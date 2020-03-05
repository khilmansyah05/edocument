function reload_data(){
    data_send = new Object();
    data_send = $('#display-table').serializeObject();


    $.ajax({
        type : 'POST',
        dataType : 'json',
        data : data_send,
        url  : $('#display-table').attr('action'),
        success : function(result) {
            if(result == null) {
                var tr_count = $( "#listed-table thead tr th" ).length;
                $('#listed-table tbody').html("<tr><td colspan='"+tr_count+"' class='alert alert-danger'>Terjadi Kesalahan Pada Sistem!</td></tr>");
                return;
            }
            //console.log(result.content);
            if(result.content === undefined) {

                var tr_count = $( "#listed-table thead tr th" ).length;
                $('#listed-table tbody').html("<tr><td colspan='"+tr_count+"'  class='alert alert-danger'>Terjadi Kesalahan Pada Sistem!</td></tr>");
                return;
            }
            else {
                if(result.hasPrev == 'true') {
                    $('.prev-page').removeClass('disabled');
                }else {
                    $('.prev-page').addClass('disabled');
                }

                if(result.hasNext == 'true') {
                    $('.next-page').removeClass('disabled');
                }else {
                    $('.next-page').addClass('disabled');
                }


                $('#listed-table tbody').html(result.content);
            }
        },
        beforeSend : function(){
            var tr_count = $( "#listed-table thead tr th" ).length;
            $('#listed-table tbody').html("<tr><td colspan='"+tr_count+"'  class='alert alert-info'>Loading...</td></tr>");
        }
    })

}

$(document).ready(function(){
    reload_data();

    $('#select-filter').click(function(){
        reload_data();
        return false;
    })

    $('.prev-page').click(function() {
        page_now = $('.current-page').val();

        if(page_now > 1) {
            $('.current-page').val(parseInt(page_now) - 1);
            reload_data();
        }

        return false;
    })

    $('.next-page').click(function(){
        page_now = $('.current-page').val();

        if(!$(this).hasClass('disabled')) {
            $('.current-page').val(parseInt(page_now) + 1);
            reload_data();
        }

        return false;
    });
});
