import Swal from "sweetalert2";
window.Swal = Swal;

window.confirmDelete = function (userId) {
    Swal.fire({
        title: "¿Estás seguro?",
        text: "¡No podrás revertir esto!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#d33",
        cancelButtonColor: "#3085d6",
        confirmButtonText: "Sí, eliminar",
        cancelButtonText: "Cancelar",
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById("delete-form" + userId).submit();
        }
    });
};

// Selecciona el mensaje
const alertMessage = document.getElementById("alert-message");
if (alertMessage) {
    setTimeout(() => {
        alertMessage.style.display = "none";
    }, 4000);
};

        function mostrarImagen(event) {
            var reader = new FileReader();
            reader.onload = function() {
                var output = document.getElementById('preview');
                output.src = reader.result;
                output.classList.remove('hidden');
            };
            reader.readAsDataURL(event.target.files[0]);
        };
