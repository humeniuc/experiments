<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <title>Webcam Test</title>
</head>
<body>
    <div><?php echo time(); ?></div>
  <video style="outline:1px solid red" id="video" autoplay playsinline></video>

  <script>
    const video = document.getElementById('video');

    async function start() {
      try {
        const stream = await navigator.mediaDevices.getUserMedia({ video: true });
        video.srcObject = stream;
      } catch (err) {
        console.error('Camera error:', err);
      }
    }

    start();
  </script>
</body>
</html>
