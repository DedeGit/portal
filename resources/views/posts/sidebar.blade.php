<div class="sidebar-container">

    {{-- Sidebar Kiri --}}
    <aside id="sidebar-left" class="sidebar sidebar-left" data-has-ads="{{ $adsLeft->isNotEmpty() ? '1' : '0' }}">

        <button class="sidebar-toggle toggle-right" onclick="toggleSidebar('sidebar-left')">&times;</button>
        <h4 class="sidebar-title">Iklan</h4>
        @if($adsLeft->isEmpty())
            <p>Tidak ada iklan aktif di sidebar kiri.</p>
        @else
            @foreach($adsLeft as $ad)
                <div class="ad-item">
                    <a href="{{ $ad->url ?? '#' }}" target="_blank" rel="noopener">
                        <img src="{{ asset('uploads/ads/' . $ad->image) }}" alt="{{ $ad->title }}" />
                    </a>
                    <p class="ad-caption">{{ $ad->title }}</p>
                </div>
            @endforeach
        @endif
    </aside>

    {{-- Sidebar Kanan --}}
    <aside id="sidebar-right" class="sidebar sidebar-right" data-has-ads="{{ $adsRight->isNotEmpty() ? '1' : '0' }}">

        <button class="sidebar-toggle toggle-left" onclick="toggleSidebar('sidebar-right')">&times;</button>
        <h4 class="sidebar-title">Iklan</h4>
        @if($adsRight->isEmpty())
            <p>Tidak ada iklan aktif di sidebar kanan.</p>
        @else
            @foreach($adsRight as $ad)
                <div class="ad-item">
                    <a href="{{ $ad->url ?? '#' }}" target="_blank" rel="noopener">
                        <img src="{{ asset('uploads/ads/' . $ad->image) }}" alt="{{ $ad->title }}" />
                    </a>
                    <p class="ad-caption">{{ $ad->title }}</p>
                </div>
            @endforeach
        @endif
    </aside>

    {{-- Tombol toggle sidebar kiri (muncul di luar saat sidebar kiri tersembunyi) --}}
    <button id="toggle-btn-left" class="sidebar-toggle open-btn left" onclick="toggleSidebar('sidebar-left')" style="display:none;">
        &#9776;
    </button>

    {{-- Tombol toggle sidebar kanan (muncul di luar saat sidebar kanan tersembunyi) --}}
    <button id="toggle-btn-right" class="sidebar-toggle open-btn right" onclick="toggleSidebar('sidebar-right')" style="display:none;">
        &#9776;
    </button>

</div>

<script>
const sidebars = ['sidebar-left', 'sidebar-right'];
const sidebarStates = {
    'sidebar-left': false,
    'sidebar-right': false
};

const SHOW_DELAY = 10000; // 10 detik
const AUTO_HIDE_DELAY = 10000; // 10 detik

function showSidebar(id) {
    const sidebar = document.getElementById(id);

    if (sidebar._autoHideTimer) {
        clearTimeout(sidebar._autoHideTimer);
    }

    sidebar.style.transform = 'translateX(0)';
    sidebarStates[id] = true;

    sidebar._autoHideTimer = setTimeout(() => {
        hideSidebar(id);
    }, AUTO_HIDE_DELAY);
}

function hideSidebar(id) {
    const sidebar = document.getElementById(id);

    sidebar.style.transform = (id === 'sidebar-left')
        ? 'translateX(-100%)'
        : 'translateX(100%)';

    sidebarStates[id] = false;

    if (sidebar._autoHideTimer) {
        clearTimeout(sidebar._autoHideTimer);
    }
}

// tombol close (×)
function toggleSidebar(id) {
    if (sidebarStates[id]) {
        hideSidebar(id);
    }
}

window.addEventListener('load', () => {
    sidebars.forEach(id => {
        const sidebar = document.getElementById(id);
        const hasAds = sidebar.dataset.hasAds === '1';

        if (!hasAds) return;

        // sembunyikan awal
        sidebar.style.transform = (id === 'sidebar-left')
            ? 'translateX(-100%)'
            : 'translateX(100%)';

        // tampil setelah 10 detik
        setTimeout(() => {
            showSidebar(id);
        }, SHOW_DELAY);
    });
});
</script>


