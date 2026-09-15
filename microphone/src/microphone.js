navigator.mediaDevices.getUserMedia({ audio: true })
  .then(stream => {
    console.log("Microphone access granted");
    const audioContext = new AudioContext();
    const source = audioContext.createMediaStreamSource(stream);
    const analyser = audioContext.createAnalyser();
    source.connect(analyser);

    const data = new Uint8Array(analyser.frequencyBinCount);

    function checkVolume() {
      analyser.getByteFrequencyData(data);
      const volume = data.reduce((a, b) => a + b) / data.length;
      console.log("Volume:", volume);
      requestAnimationFrame(checkVolume);
    }

    checkVolume();
  })
  .catch(err => console.error("Mic access denied:", err));
