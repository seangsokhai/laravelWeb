require('./preview-img');

// // ES6 Modules or TypeScript
// import Swal from 'sweetalert2'

const Swal = require('sweetalert2');
var toastMixin = Swal.mixin({
    toast: true,
    icon: 'success',
    title: 'General Title',
    animation: false,
    position: 'top-right',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    didOpen: (toast) => {
    toast.addEventListener('mouseenter', Swal.stopTimer)
    toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
});
function alertMessage(){
    toastMixin.fire({
        animation: true,
        title: 'Successful'
    });
}

// Material Select Initialization
$(document).ready(function() {
    $('.mdb-select').materialSelect();
});