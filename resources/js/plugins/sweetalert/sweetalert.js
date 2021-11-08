const Swal = require('sweetalert2');

window.notify = function (type, message) {
     Swal.fire({
        icon: type,
        text: message,
        toast: true,
        showConfirmButton: false,
        position: 'top-right',
        width: 250,
        timer: 2000
    });
}

window.confirmation = function(idButton, question, type,isConfirmed,buttonConfirmText = 'Sim', buttonCancelText = 'Não') {
    try{
        return document.getElementById(idButton).addEventListener('click', function(event) {
            Swal.fire({
                text: question,
                icon: type,
                showConfirmButton: true,
                confirmButtonText: buttonConfirmText,
                confirmButtonColor: "#EE0000",
                showCancelButton: true,
                cancelButtonText: buttonCancelText,
            }).then(result => {
                if(result.isConfirmed) {
                    isConfirmed(event);
                }
            });
        });
    }catch(e) {

    }
}
