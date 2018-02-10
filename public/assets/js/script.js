/**
 * Created by smartankur4u on 21/10/17.
 */




// $('#user_save').on('click', function () {

function user_save() {

// $('#user_save').on('click', function (event) {

    // event.preventDefault();

    console.log('from user_save function');
    var form_id=$(this).parent().parent().children("form").attr('id');
    console.log(form_id);

    $.ajax({
        method:'POST',
        url:url_user_edit,
        // data:{body: $('textarea#post_body').val(), postID:$('#postID').val(), _token:token}
        data: $('#'.concat(form_id)).serialize(),
        cache: false,
    })

        .done(function (msg) {
            console.log(msg['msg']);
            console.log('ajax over');
            // $('#display_post_body_'.concat($('#postID').val())).text(msg['new_body']);

        });

};



$('.datepicker').pickadate({
    selectMonths: true, // Creates a dropdown to control month
    selectYears: 15, // Creates a dropdown of 15 years to control year
    format: 'yyyy-mm-dd'
});



//Time Picker:
$('.timepicker').pickatime({
    default: 'now',
    twelvehour: false, // change to 12 hour AM/PM clock from 24 hour
    donetext: 'OK',
    autoclose: false,
    vibrate: true // vibrate the device when dragging clock hand
});


// $('.like').on('click', function (event) {
//     event.preventDefault();
//     var isLike=event.target.previousElementSibling==null?true:false;
//     // console.log(isLike);
//     $.ajax({
//         method: 'POST',
//         url:url_like,
//         data: {isLike:isLike, postID:..., _token:token}
//     })
//
//
// });


$(document).ready(function() {
    $('#users_table').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    } );
} );

var table = $('#example').DataTable({
    "ajax": 'https://api.myjson.com/bins/qgcu',
    "order": [],
    "dom": 'Bfrtip',
    "buttons": {
        "dom": {
            "button": {
                "tag": "button",
                "className": "waves-effect waves-light btn mrm"
            }
        },
        "buttons": [ 'copyHtml5', 'excelHtml5', 'csvHtml5', 'pdfHtml5' ]
    }
});
