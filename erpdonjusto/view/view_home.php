<?php
/**
 * Project:  ErpLeo
 * File: view_home.php
 * Created on: Feb 17, 2017
 * Author: Leonardo Gabriel Tellez Saucedo (mr_mustard123@hotmail.com)
 */
?>

<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="HandheldFriendly" content="true">
        <meta name="viewport" content="width=device-width, initial-scale=0.666667, maximum-scale=0.666667, user-scalable=0">
        <meta name="viewport" content="width=device-width">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <style>
            #session-timer {
                position: fixed;
                top: 10px;
                right: 10px;
                background-color: #f8f8f8;
                border: 1px solid #ddd;
                padding: 8px 12px;
                border-radius: 4px;
                font-size: 14px;
                z-index: 1000;
                box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            }
            .warning {
                color: #cc0000;
                font-weight: bold;
            }
        </style>

<title>ERP DON JUSTO</title>
</head>

<body>
    
    <?php require "view_links.php" ?>

    <!-- Session Timer -->
    <div id="session-timer">
        Sesión expira en: <span id="timer">--:--:--</span>
    </div>
    
    <div class="wrapper">

        <?php require "view_menu.php";  ?>

        <div id="div_target">
            <div style="width: 100%;"><span class="txt_company">Ap&iacute;cola"Don Justo"</span><br/><img src="view/images/logo_adj.png" width="170em" height="170em" style="margin-left:2em;"/></div>
        </div>                
    </div>

    <script>
    $(document).ready(function() {
        // Variable para almacenar el intervalo de actualización
        let timerInterval;
        
        // Función para actualizar el contador de sesión
        function updateSessionTimer() {
            $.ajax({
                url: 'get_session_time.php',
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
                            window.location.href = 'index.php?action=login';
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
                url: 'reset_session_activity.php',
                type: 'POST',
                dataType: 'json'
            });
        });
    });
    </script>

</body>
</html>