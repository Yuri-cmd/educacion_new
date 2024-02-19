<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Escaneo de código QR con la cámara</title>
    <script src="https://cdn.jsdelivr.net/npm/jsqr/dist/jsQR.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <video id="video" width="400" height="300" autoplay></video>
    <canvas id="canvas" width="400" height="300" style="display: none;"></canvas>
    <div id="result"></div>

    <script>
        const video = document.getElementById('video');
        const canvas = document.getElementById('canvas');
        const ctx = canvas.getContext('2d');
        let scanning = false;

        navigator.mediaDevices.getUserMedia({ video: { facingMode: 'environment' } })
            .then((stream) => {
                video.srcObject = stream;
                video.play();
            })
            .catch((err) => {
                console.error('Error al acceder a la cámara:', err);
            });

        video.addEventListener('play', () => {
            const loop = () => {
                if (!video.paused && !video.ended && !scanning) {
                    ctx.drawImage(video, 0, 0, canvas.width, canvas.height);
                    const imageData = ctx.getImageData(0, 0, canvas.width, canvas.height);
                    const code = jsQR(imageData.data, imageData.width, imageData.height);
                    if (code) {
                        const scannedID = code.data;
                        enviarID(scannedID); // Enviar ID escaneado a PHP
                        scanning = true;
                    }
                }
                requestAnimationFrame(loop);
            };
            loop();
        });

        function enviarID(id) {
            $.ajax({
                url: '<?=URL::base()?>/ajax/save_asistencia',
                method: 'POST',
                data: { id: id, 'opcion': 'save_asistencia' },
                success: function(response) {
                    scanning = false;
                    alert('Código QR escaneado y procesado con éxito.');
                },
                error: function(xhr, status, error) {
                    console.error('Error al enviar el ID escaneado al servidor:', error);
                    scanning = false;
                    alert('Ocurrió un error al procesar el código QR.');
                }
            });
        }
    </script>
</body>
</html>
