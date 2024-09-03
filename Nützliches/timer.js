<div id="timer" 
    data-current-timestamp="<?php esc_attr_e($current_time*1000); ?>" 
    data-past-timestamp="<?php esc_attr_e($user_started*1000); ?>">
</div>

<script>
    function updateTimer() {
        const timerElement = document.getElementById('timer');
        const currentTimestamp = parseInt(timerElement.getAttribute('data-current-timestamp'));
        const pastTimestamp = parseInt(timerElement.getAttribute('data-past-timestamp'));

        const elapsedTime = (currentTimestamp - pastTimestamp) / 1000; // Sekunden
        const remainingTime = Math.max(0, <?php esc_attr_e($mins_45); ?> - elapsedTime); // Sekunden

        const minutes = Math.floor(remainingTime / 60);
        const seconds = Math.floor(remainingTime % 60);

        // Stunden und Minuten formatieren
        const hours = Math.floor(minutes / 60);
        const formattedMinutes = minutes % 60;

        const formattedTime = `${String(formattedMinutes).padStart(2, '0')}:${String(seconds).padStart(2, '0')}`;
        
        timerElement.textContent = `${formattedTime} verbleibend`;

        // Timer um eine Sekunde erhöhen
        timerElement.setAttribute('data-current-timestamp', currentTimestamp + 1000);
    }

    setInterval(updateTimer, 1000);
    updateTimer(); // Sofortiges Initialisieren
</script>