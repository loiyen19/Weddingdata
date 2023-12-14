// assets/js/live-clock.js

function updateClock() {
    var now = new Date();
    var hours = now.getHours();
    var minutes = now.getMinutes();
    var seconds = now.getSeconds();

    // ... (logika waktu seperti sebelumnya)

    // Menghitung sisa waktu pembayaran
    var paymentDeadline = new Date(document.getElementById('paymentDeadline').innerText);
    var timeRemaining = paymentDeadline - now;

    // ... (logika sisa waktu seperti sebelumnya)

    // Menetapkan teks sisa waktu ke elemen dengan ID 'timeRemaining'
    document.getElementById('timeRemaining').innerText = remainingHours + ':' + remainingMinutes + ':' + remainingSeconds;
}

// ... (panggilan setInterval dan pemanggilan updateClock seperti sebelumnya)
