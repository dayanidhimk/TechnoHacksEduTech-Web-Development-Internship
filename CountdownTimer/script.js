let timer;
    let durationInSeconds = 300; // 5 minutes by default
    let timerRunning = false;
    let remainingTime = 0;

    function startTimer() {
        if (timerRunning) 
            durationInSeconds = remainingTime;
      else
            durationInSeconds = calculateTotalSeconds();
        updateDisplay(durationInSeconds);
        timer = setInterval(updateTimer, 1000);
        toggleButtons(true);
        timerRunning = true;
    }

    function stopTimer() {
      clearInterval(timer);
      toggleButtons(false);
      timerRunning = true;
      remainingTime = durationInSeconds;
    }

    function resetTimer() {
      clearInterval(timer);
      durationInSeconds = calculateTotalSeconds();
      updateDisplay(durationInSeconds);
      toggleButtons(false);
      timerRunning = false;
      remainingTime = 0;
    }

    function restartTimer() {
      resetTimer();
      startTimer();
    }

    function calculateTotalSeconds() {
      const hours = parseInt(document.getElementById('hoursInput').value, 10);
      const minutes = parseInt(document.getElementById('minutesInput').value, 10);
      const seconds = parseInt(document.getElementById('secondsInput').value, 10);

      return hours * 3600 + minutes * 60 + seconds;
    }

    function updateTimer() {
      if (durationInSeconds > 0) {
        durationInSeconds--;
        updateDisplay(durationInSeconds);
      } else {
        clearInterval(timer);
        toggleButtons(false);
        alert('Time is up!');
        timerRunning = false;
      }
    }

    function updateDisplay(seconds) {
      const hours = Math.floor(seconds / 3600);
      const minutes = Math.floor((seconds % 3600) / 60);
      const remainingSeconds = seconds % 60;

      document.getElementById('timer').innerText = `${hours}:${String(minutes).padStart(2, '0')}:${String(remainingSeconds).padStart(2, '0')}`;
    }

    function toggleButtons(running) {
      document.getElementById('startButton').disabled = running;
      document.querySelectorAll('.time-input').forEach(input => {
        input.disabled = running;
      });
    }

    // Initial display
    updateDisplay(durationInSeconds);
    toggleButtons(false);