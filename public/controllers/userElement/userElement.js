

const model = 'user_elements';






$(document).ready(function() {
    $('#formAssignElement').on('submit', function(e) {
        e.preventDefault();
        var formData = $(this).serialize();
        
        $.ajax({
            type: 'POST',
            url: '<?= base_url('UserElement/assignElement') ?>',
            data: formData,
            dataType: 'json',
            success: function(response) {
                if (response.message === 'success') {
                    alert('Elemento asignado correctamente.');
                    // Aquí podrías hacer más acciones si es necesario
                } else {
                    alert('Error al asignar elemento: ' + response.message);
                }
            },
            error: function(xhr, status, error) {
                alert('Error: ' + error);
            }
        });
    });
});
