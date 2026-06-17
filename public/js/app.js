document.addEventListener('DOMContentLoaded', function() {
    // ==========================================
    // 1. Mobile Navbar Toggle
    // ==========================================
    const navToggle = document.getElementById('nav-toggle');
    const navLinks = document.getElementById('nav-links');

    if (navToggle && navLinks) {
        navToggle.addEventListener('click', function() {
            navLinks.classList.toggle('active');
            const icon = navToggle.querySelector('i');
            if (navLinks.classList.contains('active')) {
                icon.className = 'fa-solid fa-xmark';
            } else {
                icon.className = 'fa-solid fa-bars';
            }
        });
    }

    // ==========================================
    // 2. Floating Ice Flakes Particle Generator
    // ==========================================
    const iceDustContainer = document.getElementById('ice-dust');
    if (iceDustContainer) {
        const flakeCount = 30;
        const symbols = ['❄', '❅', '❆'];
        for (let i = 0; i < flakeCount; i++) {
            const flake = document.createElement('div');
            flake.className = 'ice-flake';
            flake.innerHTML = symbols[Math.floor(Math.random() * symbols.length)];
            
            // Randomize styling properties for organic look
            const size = Math.random() * 12 + 8; // 8px to 20px
            const left = Math.random() * 100; // 0% to 100% width
            const duration = Math.random() * 15 + 10; // 10s to 25s
            const delay = Math.random() * -20; // negative offset to start instantly
            
            flake.style.fontSize = `${size}px`;
            flake.style.left = `${left}%`;
            flake.style.animationDuration = `${duration}s`;
            flake.style.animationDelay = `${delay}s`;
            
            iceDustContainer.appendChild(flake);
        }
    }

    // ==========================================
    // 3. AJAX Submission: Contact Message Form
    // ==========================================
    const contactForm = document.getElementById('contact-form');
    if (contactForm) {
        contactForm.addEventListener('submit', function(e) {
            e.preventDefault();

            const alertSuccess = document.getElementById('contact-alert-success');
            const alertError = document.getElementById('contact-alert-error');
            const submitBtn = document.getElementById('contact-submit-btn');

            alertSuccess.style.display = 'none';
            alertError.style.display = 'none';

            const originalBtnHtml = submitBtn.innerHTML;
            submitBtn.disabled = true;
            submitBtn.innerHTML = '<span class="spinner"></span> Mengirim...';

            const formData = new FormData(this);

            fetch(this.getAttribute('action'), {
                method: 'POST',
                body: formData,
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            })
            .then(response => response.json().then(data => ({ status: response.status, body: data })))
            .then(res => {
                submitBtn.disabled = false;
                submitBtn.innerHTML = originalBtnHtml;

                if (res.status === 200 && res.body.success) {
                    alertSuccess.textContent = res.body.message;
                    alertSuccess.style.display = 'block';
                    contactForm.reset();
                } else {
                    let errMsg = 'Terjadi kesalahan. Silakan coba beberapa saat lagi.';
                    if (res.body.errors) {
                        errMsg = Object.values(res.body.errors).map(err => err.join('<br>')).join('<br>');
                    } else if (res.body.message) {
                        errMsg = res.body.message;
                    }
                    alertError.innerHTML = errMsg;
                    alertError.style.display = 'block';
                }
            })
            .catch(err => {
                submitBtn.disabled = false;
                submitBtn.innerHTML = originalBtnHtml;
                alertError.textContent = 'Gagal terhubung ke server. Pastikan koneksi internet Anda aktif.';
                alertError.style.display = 'block';
            });
        });
    }

    // ==========================================
    // 4. AJAX Submission: Warranty Claim Form
    // ==========================================
    const warrantyForm = document.getElementById('warranty-form');
    if (warrantyForm) {
        warrantyForm.addEventListener('submit', function(e) {
            e.preventDefault();

            const alertSuccess = document.getElementById('warranty-alert-success');
            const alertError = document.getElementById('warranty-alert-error');
            const submitBtn = document.getElementById('warranty-submit-btn');

            alertSuccess.style.display = 'none';
            alertError.style.display = 'none';

            const originalBtnHtml = submitBtn.innerHTML;
            submitBtn.disabled = true;
            submitBtn.innerHTML = '<span class="spinner"></span> Mendaftarkan Klaim...';

            const formData = new FormData(this);

            fetch(this.getAttribute('action'), {
                method: 'POST',
                body: formData,
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            })
            .then(response => response.json().then(data => ({ status: response.status, body: data })))
            .then(res => {
                submitBtn.disabled = false;
                submitBtn.innerHTML = originalBtnHtml;

                if (res.status === 200 && res.body.success) {
                    alertSuccess.textContent = res.body.message;
                    alertSuccess.style.display = 'block';
                    warrantyForm.reset();
                } else {
                    let errMsg = 'Terjadi kesalahan saat memproses klaim Anda.';
                    if (res.body.errors) {
                        errMsg = Object.values(res.body.errors).map(err => err.join('<br>')).join('<br>');
                    } else if (res.body.message) {
                        errMsg = res.body.message;
                    }
                    alertError.innerHTML = errMsg;
                    alertError.style.display = 'block';
                }
            })
            .catch(err => {
                submitBtn.disabled = false;
                submitBtn.innerHTML = originalBtnHtml;
                alertError.textContent = 'Gagal terhubung ke server. Silakan periksa koneksi Anda.';
                alertError.style.display = 'block';
            });
        });
    }
});
