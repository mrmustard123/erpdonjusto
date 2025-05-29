    $(document).ready(function() {
        // Variable para almacenar el intervalo de actualización
        let timerInterval;
        
        // Función para actualizar el contador de sesión
        function updateSessionTimer() {
            $.ajax({
                url: 'view/get_session_time.php',
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    if (data.status === 'active') {
                        // Calcular horas, minutos y segundos restantes
                        const totalSeconds = data.remaining_time;
                        const hours = Math.floor(totalSeconds / 3600);
                        const minutes = Math.floor((totalSeconds % 3600) / 60);
                        const seconds = totalSeconds % 60;
                        
                        // Formatear la salida con ceros iniciales si es necesario
                        const formattedTime = 
                            (hours < 10 ? '0' + hours : hours) + ':' +
                            (minutes < 10 ? '0' + minutes : minutes) + ':' +
                            (seconds < 10 ? '0' + seconds : seconds);
                        
                        // Actualizar el texto del temporizador
                        $('#timer').text(formattedTime);
                        
                        // Agregar clase de advertencia si queda menos de 5 minutos
                        if (totalSeconds < 300) {
                            $('#timer').addClass('warning');
                        } else {
                            $('#timer').removeClass('warning');
                        }
                    } else {
                        // Si la sesión ha expirado
                        $('#timer').text('Expirada');
                        $('#timer').addClass('warning');
                        clearInterval(timerInterval);
                        
                        // Opcional: Redirigir a la página de login después de un breve retraso
                        setTimeout(function() {
                            window.location.href = '../index.php?action=login';
                        }, 3000);
                    }
                },
                error: function() {
                    $('#timer').text('Error');
                }
            });
        }
        
        // Actualizar el temporizador inmediatamente y luego cada segundo
        updateSessionTimer();
        timerInterval = setInterval(updateSessionTimer, 1000);
        
        // Opcionalmente, reiniciar el contador de inactividad cuando el usuario interactúa con la página
        $(document).on('click keypress mousemove', function() {
            $.ajax({
                url: 'view/reset_session_activity.php',
                type: 'POST',
                dataType: 'json'
            });
        });
    });