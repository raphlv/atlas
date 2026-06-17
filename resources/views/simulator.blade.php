@extends('layouts.app')

@section('content')
<div class="simulator-container">
    <div class="section-title-center" style="margin-bottom: 3rem;">
        <h2>Cooling <span class="highlight">Performance Simulator</span></h2>
        <p>Uji secara langsung performa pendinginan es ATLAS GEAR dalam mencegah thermal throttling pada smartphone Anda.</p>
    </div>

    <div class="sim-grid">
        <!-- Control Form panel -->
        <div class="sim-controls-panel glass-card">
            <h3>Konfigurasi Testbench</h3>
            
            <div class="form-group">
                <label class="form-label" for="phone-select">Pilih Smartphone Anda</label>
                <select id="phone-select" class="form-select">
                    <option value="iphone15" data-base-temp="42" data-throttled-fps="35" data-max-fps="60">iPhone 15 Pro Max (Apple A17 Pro)</option>
                    <option value="pocof5" data-base-temp="44" data-throttled-fps="42" data-max-fps="120">POCO F5 Pro (Snapdragon 8+ Gen 1)</option>
                    <option value="rog8" data-base-temp="41" data-throttled-fps="55" data-max-fps="120">ASUS ROG Phone 8 (Snapdragon 8 Gen 3)</option>
                    <option value="s24" data-base-temp="43" data-throttled-fps="38" data-max-fps="60">Samsung Galaxy S24 Ultra (Exynos 2400)</option>
                    <option value="infinix" data-base-temp="45" data-throttled-fps="30" data-max-fps="90">Infinix GT 20 Pro (Dimensity 8200 Ultimate)</option>
                </select>
            </div>

            <div class="form-group">
                <label class="form-label" for="game-select">Pilih Game & Grafik</label>
                <select id="game-select" class="form-select">
                    <option value="genshin" data-label="Genshin Impact (Highest 60 FPS)">Genshin Impact (Highest - 60 FPS)</option>
                    <option value="mlbb" data-label="Mobile Legends (Ultra 120 FPS)">Mobile Legends (Ultra - 120 FPS)</option>
                    <option value="pubgm" data-label="PUBG Mobile (Smooth 90 FPS)">PUBG Mobile (Smooth - 90 FPS)</option>
                    <option value="zzz" data-label="Zenless Zone Zero (High 60 FPS)">Zenless Zone Zero (High - 60 FPS)</option>
                </select>
            </div>

            <div class="form-group">
                <label class="form-label" for="cooler-select">Pilih ATLAS Cooler</label>
                <select id="cooler-select" class="form-select">
                    <option value="v1" data-temp-drop="25" data-label="ATLAS ARES V1 (Single TEC)">ATLAS ARES V1 (Single TEC)</option>
                    <option value="v2" data-temp-drop="31" data-label="ATLAS ARES V2 Pro (Dual Engine)">ATLAS ARES V2 Pro (Dual Engine - Extreme)</option>
                </select>
            </div>

            <button type="button" class="btn btn-trigger-cooler" id="cooler-trigger-btn">
                <i class="fa-solid fa-power-off"></i> NYALAKAN ATLAS COOLER
            </button>
        </div>

        <!-- Simulation Screen panel -->
        <div class="sim-screen-panel">
            <div class="device-indicator-row">
                <span>HP: <strong id="screen-phone-lbl">iPhone 15 Pro Max</strong></span>
                <span>Game: <strong id="screen-game-lbl">Genshin Impact (Highest 60 FPS)</strong></span>
            </div>

            <!-- Dial Temp Gauge -->
            <div class="temp-gauge-container" id="temp-gauge">
                <div class="fan-icon-animation">
                    <i class="fa-solid fa-snowflake"></i>
                </div>
                <div class="temp-value-label"><span id="temp-value">42</span><span class="temp-unit">°C</span></div>
                <div class="status-text-indicator" id="cooler-status-text" style="color: #ef4444;">OVERHEAT (THROTTLING)</div>
            </div>

            <!-- Performance stats row -->
            <div class="perf-stats-row">
                <div class="perf-box">
                    <div class="label">Bingkai Per Detik (FPS)</div>
                    <div class="value fps-value throttled" id="fps-value">35 FPS</div>
                </div>
                <div class="perf-box">
                    <div class="label">Suhu Cooler Surface</div>
                    <div class="value" id="cooler-temp-value">31°C</div>
                </div>
            </div>

            <!-- Interactive visual warning / cooling text -->
            <div style="margin-top: 2rem; width: 100%; text-align: center;">
                <p id="simulation-notes" style="font-size: 0.9rem; color: var(--text-muted); line-height: 1.5;">
                    HP mengalami panas berlebih yang memicu thermal throttling. Grafik game terpaksa diturunkan secara internal oleh OS sehingga FPS drop parah dan patah-patah.
                </p>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const phoneSelect = document.getElementById('phone-select');
    const gameSelect = document.getElementById('game-select');
    const coolerSelect = document.getElementById('cooler-select');
    const triggerBtn = document.getElementById('cooler-trigger-btn');
    
    const screenPhone = document.getElementById('screen-phone-lbl');
    const screenGame = document.getElementById('screen-game-lbl');
    const tempValue = document.getElementById('temp-value');
    const fpsValue = document.getElementById('fps-value');
    const coolerTemp = document.getElementById('cooler-temp-value');
    const statusText = document.getElementById('cooler-status-text');
    const tempGauge = document.getElementById('temp-gauge');
    const simNotes = document.getElementById('simulation-notes');

    let isCooling = false;
    let updateInterval = null;

    function resetSimulation() {
        if (updateInterval) clearInterval(updateInterval);
        isCooling = false;
        
        triggerBtn.innerHTML = '<i class="fa-solid fa-power-off"></i> NYALAKAN ATLAS COOLER';
        triggerBtn.classList.remove('cooling-active');
        tempGauge.classList.remove('cooling-active');
        
        const selectedOption = phoneSelect.options[phoneSelect.selectedIndex];
        const baseTemp = parseInt(selectedOption.getAttribute('data-base-temp'));
        const throttledFps = parseInt(selectedOption.getAttribute('data-throttled-fps'));

        screenPhone.textContent = selectedOption.text.split(' (')[0];
        screenGame.textContent = gameSelect.options[gameSelect.selectedIndex].getAttribute('data-label');

        tempValue.textContent = baseTemp;
        tempValue.style.color = '#ef4444';
        
        fpsValue.textContent = throttledFps + ' FPS';
        fpsValue.className = 'value fps-value throttled';
        
        coolerTemp.textContent = baseTemp + '°C';
        coolerTemp.style.color = '';
        
        statusText.textContent = 'OVERHEAT (THROTTLING)';
        statusText.style.color = '#ef4444';
        
        simNotes.textContent = 'HP mengalami panas berlebih yang memicu thermal throttling. CPU/GPU terpaksa diturunkan dayanya secara internal sehingga FPS drop parah dan patah-patah.';
    }

    // Initialize values
    resetSimulation();

    phoneSelect.addEventListener('change', resetSimulation);
    gameSelect.addEventListener('change', resetSimulation);
    coolerSelect.addEventListener('change', resetSimulation);

    triggerBtn.addEventListener('click', function() {
        if (isCooling) {
            resetSimulation();
            return;
        }

        isCooling = true;
        triggerBtn.innerHTML = '<i class="fa-solid fa-snowflake"></i> MATIKAN COOLER';
        triggerBtn.classList.add('cooling-active');
        tempGauge.classList.add('cooling-active');

        const selectedPhone = phoneSelect.options[phoneSelect.selectedIndex];
        const baseTemp = parseInt(selectedPhone.getAttribute('data-base-temp'));
        const maxFps = parseInt(selectedPhone.getAttribute('data-max-fps'));
        const throttledFps = parseInt(selectedPhone.getAttribute('data-throttled-fps'));

        const selectedCooler = coolerSelect.options[coolerSelect.selectedIndex];
        const tempDrop = parseInt(selectedCooler.getAttribute('data-temp-drop'));
        
        const targetTemp = Math.max(12, baseTemp - tempDrop);
        const coolerTargetTemp = selectedCooler.value === 'v2' ? '0°C (ICE)' : '10°C';

        let currentTemp = baseTemp;
        let currentFps = throttledFps;
        let currentCoolerTemp = baseTemp;

        statusText.textContent = 'PROSES PENDINGINAN...';
        statusText.style.color = '#38bdf8';
        simNotes.textContent = 'Cooler Peltier diaktifkan. Kipas berputar berkecepatan penuh menarik panas dari bodi belakang smartphone dan menyebarkannya keluar secara instan.';

        updateInterval = setInterval(function() {
            let changed = false;

            if (currentTemp > targetTemp) {
                currentTemp--;
                tempValue.textContent = currentTemp;
                changed = true;
            }

            if (currentFps < maxFps) {
                currentFps += Math.ceil((maxFps - throttledFps) / 10);
                if (currentFps > maxFps) currentFps = maxFps;
                fpsValue.textContent = currentFps + ' FPS';
                changed = true;
            }

            if (currentCoolerTemp > (selectedCooler.value === 'v2' ? 0 : 10)) {
                currentCoolerTemp -= 3;
                if (currentCoolerTemp < (selectedCooler.value === 'v2' ? 0 : 10)) {
                    currentCoolerTemp = (selectedCooler.value === 'v2' ? 0 : 10);
                }
                coolerTemp.textContent = currentCoolerTemp + '°C';
            }

            if (!changed) {
                clearInterval(updateInterval);
                statusText.textContent = 'DINGIN STABIL (FROSTED)';
                statusText.style.color = '#00d8f6';
                fpsValue.className = 'value fps-value boosted';
                
                simNotes.textContent = 'Suhu HP telah diturunkan ke titik aman stabil. Sensor throttling dinonaktifkan oleh OS. Performa CPU/GPU dilepas 100% menghasilkan frame rate maksimal tanpa kendala!';
            }
        }, 150);
    });
});
</script>
@endsection
