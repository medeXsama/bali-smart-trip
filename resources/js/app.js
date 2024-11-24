document.addEventListener('DOMContentLoaded', () => {
    // Modal Landing Page
    const startButton = document.getElementById('startButton');
    const startModal = document.getElementById('startModal');

    startButton?.addEventListener('click', () => {
        startModal.classList.remove('hidden');
        startModal.classList.add('show'); // Tampilkan dengan fade-in
    });

    startModal?.addEventListener('click', (event) => {
        if (event.target === startModal) {
            startModal.classList.remove('show'); // Efek fade-out
            startModal.classList.add('hidden');
        }
    });

    // Modal Dashboard (Preferensi Spesifik)
    const dashboardModal = document.getElementById('dashboardPreferenceModal');
    const saveButton = document.getElementById('savePreferences');

    function showDashboardModal() {
        dashboardModal.classList.add('show'); // Tampilkan modal
    }

    function hideDashboardModal() {
        dashboardModal.classList.remove('show');
    }

    saveButton?.addEventListener('click', () => {
        const selectedPreferences = [];
        dashboardModal.querySelectorAll('.card.selected').forEach((card) => {
            selectedPreferences.push(card.querySelector('h3').innerText);
        });

        console.log('Preferensi Disimpan:', selectedPreferences); // Lihat preferensi di konsol
        hideDashboardModal(); // Tutup modal setelah simpan
    });

    dashboardModal?.querySelectorAll('.card').forEach((card) => {
        card.addEventListener('click', () => {
            card.classList.toggle('selected'); // Tambah/hapus kelas "selected"
        });
    });

    window.onload = function () {
        showDashboardModal();
    };

    // Modal Logout
    const logoutModal = document.getElementById('logoutModal');
    const logoutButton = document.getElementById('logoutButton');
    const confirmLogoutButton = document.getElementById('confirmLogout');
    const cancelLogoutButton = document.getElementById('cancelLogout');

    logoutButton?.addEventListener('click', () => {
        logoutModal.classList.remove('hidden');
        logoutModal.classList.add('show'); // Tampilkan modal logout
    });

    logoutModal?.addEventListener('click', (event) => {
        if (event.target === logoutModal) {
            logoutModal.classList.remove('show');
            logoutModal.classList.add('hidden');
        }
    });

    confirmLogoutButton?.addEventListener('click', async () => {
        console.log('Logout confirmed');
        try {
            // Kirim permintaan logout ke backend
            const response = await fetch('/logout', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                },
            });

            if (response.ok) {
                // Redirect ke halaman landing page jika logout berhasil
                window.location.href = '/';
            } else {
                console.error('Logout failed');
            }
        } catch (error) {
            console.error('Error during logout:', error);
        }
    });

    cancelLogoutButton?.addEventListener('click', () => {
        logoutModal.classList.remove('show');
        logoutModal.classList.add('hidden'); // Tutup modal
    });
});
