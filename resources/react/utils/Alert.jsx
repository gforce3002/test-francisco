import swal from 'sweetalert2'

export default function Alert(err)
{
    var message = ''
    if (err.response) {
        message = err.response.data.message ?? err.response.data.exception
    }

    swal.fire({
        icon: 'error',
        title: 'Ocurrió un error al procesar la solicitud',
        text: message
    })
}
