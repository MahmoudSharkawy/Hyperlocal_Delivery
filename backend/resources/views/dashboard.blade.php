<!DOCTYPE html>
<html lang="en" class="h-full bg-slate-950">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hyperlocal Logistics Control Room</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
</head>
<body class="h-full font-sans antialiased text-slate-200 flex overflow-hidden">

    <aside class="w-64 bg-slate-900 border-r border-slate-800 flex flex-col justify-between hidden md:flex z-[1001]">
        <div>
            <div class="h-16 flex items-center px-6 border-b border-slate-800 space-x-3">
                <div class="bg-indigo-600 text-white p-2 rounded-xl shadow-lg shadow-indigo-500/30">
                    <i class="fa-solid fa-radar text-base animate-pulse"></i>
                </div>
                <span class="text-lg font-black tracking-wider text-white">NEXUS<span class="text-indigo-500">FLEET</span></span>
            </div>
            <nav class="p-4 space-y-1">
                <a href="#" class="flex items-center space-x-3 bg-indigo-600/10 text-indigo-400 px-4 py-3 rounded-xl font-medium text-sm border border-indigo-500/20">
                    <i class="fa-solid fa-chart-pie text-sm"></i>
                    <span>Live Tracking Radar</span>
                </a>
                <a href="#" class="flex items-center space-x-3 text-slate-400 hover:bg-slate-800/50 hover:text-slate-200 px-4 py-3 rounded-xl font-medium text-sm transition">
                    <i class="fa-solid fa-box-open text-sm"></i>
                    <span>Active Orders</span>
                </a>
            </nav>
        </div>
        <div class="p-4 border-t border-slate-800">
            <div class="flex items-center space-x-3 p-2 bg-slate-950/40 rounded-xl border border-slate-800/60">
                <div class="w-8 h-8 rounded-full bg-slate-800 flex items-center justify-center">
                    <span class="text-xs font-bold text-slate-400">SYS</span>
                </div>
                <div>
                    <h5 class="text-xs font-bold text-slate-300">Environment Node</h5>
                    <p class="text-[10px] text-emerald-500 font-mono">Status: Connected</p>
                </div>
            </div>
        </div>
    </aside>

    <div class="flex-1 flex flex-col min-w-0 overflow-hidden">
        <header class="h-16 bg-slate-900 border-b border-slate-800 flex items-center justify-between px-6 z-[1000]">
            <h1 class="text-base font-bold text-white flex items-center tracking-tight">
                <i class="fa-solid fa-satellite text-indigo-500 mr-2"></i> Real-time Operations Dashboard
            </h1>
            <div class="flex items-center space-x-4">
                <div class="flex items-center space-x-1.5 bg-emerald-500/10 border border-emerald-500/20 px-3 py-1 rounded-full text-[11px] font-mono font-bold text-emerald-400">
                    <span class="w-1.5 h-1.5 bg-emerald-500 rounded-full尊 animate-ping"></span>
                    <span>LOGISTICS SERVER: LIVE</span>
                </div>
            </div>
        </header>

        <div class="flex-1 overflow-y-auto p-6 space-y-6">
            
            <section class="grid grid-cols-1 md:grid-cols-3 gap-6">
                
                <div class="relative bg-slate-900 border border-slate-800 rounded-2xl p-5 overflow-hidden group shadow-xl">
                    <div class="flex items-center justify-between">
                        <span class="bg-indigo-500/10 text-indigo-400 border border-indigo-500/20 text-[10px] uppercase font-black tracking-wider px-2 py-0.5 rounded-md">Fleet Telemetry</span>
                        <i class="fa-solid fa-motorcycle text-indigo-500 text-lg"></i>
                    </div>
                    <h3 class="text-2xl font-black text-white mt-3" id="live-captains-count">6 Active</h3>
                    <p class="text-xs text-slate-400 mt-1">Total couriers broadcasting live GPS locations via socket layer.</p>
                </div>

                <div class="relative bg-slate-900 border border-slate-800 rounded-2xl p-5 overflow-hidden group shadow-xl">
                    <div class="flex items-center justify-between">
                        <span class="bg-amber-500/10 text-amber-400 border border-amber-500/20 text-[10px] uppercase font-black tracking-wider px-2 py-0.5 rounded-md">Order Dispatch</span>
                        <i class="fa-solid fa-box-taped text-amber-500 text-lg"></i>
                    </div>
                    <h3 class="text-2xl font-black text-white mt-3">14 Pending</h3>
                    <p class="text-xs text-slate-400 mt-1">Orders currently waiting in queue to be accepted by available nearby couriers.</p>
                </div>

                <div class="relative bg-slate-900 border border-slate-800 rounded-2xl p-5 overflow-hidden group shadow-xl">
                    <div class="flex items-center justify-between">
                        <span class="bg-rose-500/10 text-rose-400 border border-rose-500/20 text-[10px] uppercase font-black tracking-wider px-2 py-0.5 rounded-md">SLA Breaches</span>
                        <i class="fa-solid fa-clock-three text-rose-500 text-lg"></i>
                    </div>
                    <h3 class="text-2xl font-black text-white mt-3">2 Delayed</h3>
                    <p class="text-xs text-slate-400 mt-1">Active shipments exceeding standard ETA threshold limits due to high traffic grid.</p>
                </div>
            </section>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 items-start">
                
                <div class="space-y-6">
                    <div class="bg-slate-900 border border-slate-800 rounded-2xl p-5 shadow-xl">
                        <h3 class="text-sm font-bold text-white tracking-wide mb-1">Sandbox Gateway</h3>
                        <p class="text-xs text-slate-400 mb-4">Swap system authorization roles directly for simulation testing.</p>
                        <div class="space-y-2.5">
                            <a href="/demo-login/admin" class="flex items-center justify-between p-3 bg-slate-950 hover:bg-slate-800 border border-slate-800 hover:border-red-500/30 rounded-xl transition group">
                                <div class="flex items-center space-x-3">
                                    <div class="bg-red-500/10 text-red-400 border border-red-500/20 p-2 rounded-lg text-xs"><i class="fa-solid fa-user-crown"></i></div>
                                    <span class="font-bold text-xs text-slate-200">System Chief Administrator</span>
                                </div>
                                <i class="fa-solid fa-chevron-right text-[10px] text-slate-500 group-hover:translate-x-1 transition"></i>
                            </a>
                            <a href="/demo-login/store" class="flex items-center justify-between p-3 bg-slate-950 hover:bg-slate-800 border border-slate-800 hover:border-blue-500/30 rounded-xl transition group">
                                <div class="flex items-center space-x-3">
                                    <div class="bg-blue-500/10 text-blue-400 border border-blue-500/20 p-2 rounded-lg text-xs"><i class="fa-solid fa-warehouse"></i></div>
                                    <span class="font-bold text-xs text-slate-200">Store Depot Manager</span>
                                </div>
                                <i class="fa-solid fa-chevron-right text-[10px] text-slate-500 group-hover:translate-x-1 transition"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="lg:col-span-2">
                    <div class="bg-slate-900 border border-slate-800 rounded-2xl p-3 shadow-xl">
                        <div id="map" class="h-[520px] w-full rounded-xl border border-slate-800 z-10"></div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    <script src="https://cdn.socket.io/4.7.2/socket.io.min.js"></script>
    <script>
        const map = L.map('map').setView([30.0444, 31.2357], 13);

        L.tileLayer('https://{s}.basemaps.cartocdn.com/dark_all/{z}/{x}/{y}{r}.png', {
            maxZoom: 19,
            attribution: '© OpenStreetMap © CARTO'
        }).addTo(map);

        const driverMarkers = {};
        const socket = io('http://localhost:6001');

        socket.on('driver_moved', function(data) {
            const { driver_id, driver_name, latitude, longitude } = data;

            if (driverMarkers[driver_id]) {
                driverMarkers[driver_id].setLatLng([latitude, longitude]);
            } else {
                driverMarkers[driver_id] = L.marker([latitude, longitude])
                    .addTo(map)
                    .bindPopup(`<div class="p-1 font-sans text-slate-900"><b class="text-indigo-600">Active Node:</b><br>${driver_name}</div>`)
                    .openPopup();
            }
        });
    </script>
</body>
</html>