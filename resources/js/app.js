const { default: axios } = require('axios');

require('./bootstrap');

require('alpinejs');

require('./question');


// pokial mam auth usera tak to znamena ze som na exams.watch blade
if( window.auth_user ) {
    let exams = [];

    axios.get('/user/' + auth_user.id + '/exams')
        .then(res => {
            exams = res.data
    
            exams.forEach(exam => {
                Echo.private('exams.' + exam.id)
                .listen('.exam-window-left', function(e) {
                    var d = new Date();
                    $('#responses').append(`<li> ${d.getHours()}:${d.getMinutes()}:${d.getSeconds()} Používateľ ${e.attendance.first_name} ${e.attendance.last_name} (id: ${e.attendance.ais_id}) opustil okno na teste ${e.exam.title}</li>`)
                });
            });
            
        })
}
