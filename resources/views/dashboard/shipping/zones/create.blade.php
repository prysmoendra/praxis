@extends('layouts.app')
@section('title', 'Add Shipping Zone')
@section('content')
<div class="max-w-5xl mx-auto mt-8 bg-white p-6 rounded shadow">
    <h1 class="text-xl font-bold mb-4">Add Shipping Zone</h1>
    <form id="shippingZoneForm" action="{{ route('shipping-zones.store') }}" method="POST" class="flex flex-row gap-8">
        @csrf
        <div class="w-1/2">
            <div class="mb-4">
                <label class="block mb-1 font-semibold">Zone Name</label>
                <input type="text" name="name" class="w-full border rounded px-3 py-2" required>
            </div>
            <div class="mb-4">
                <label class="block mb-1 font-semibold">Description</label>
                <textarea name="description" class="w-full border rounded px-3 py-2"></textarea>
            </div>
            <div class="mb-4">
                <label for="prov" class="block mb-1 font-semibold">Provinsi</label>
                <select name="province" id="prov" class="type-select w-full p-2 border border-gray-300 rounded" tabindex="1">
                    <option>Pilih</option>
                </select>
            </div>
            <div class="mb-4">
                <label for="kota" class="block mb-1 font-semibold">Kota</label>
                <select name="city" id="kota" class="type-select w-full p-2 border border-gray-300 rounded" tabindex="2">
                    <option>Pilih</option>
                </select>
            </div>
            <div class="mb-4">
                <label for="kec" class="block mb-1 font-semibold">Kecamatan</label>
                <select name="district" id="kec" class="type-select w-full p-2 border border-gray-300 rounded" tabindex="3">
                    <option>Pilih</option>
                </select>
            </div>
            <div class="mb-4">
                <label for="kel" class="block mb-1 font-semibold">Kelurahan/Desa</label>
                <select name="village" id="kel" class="type-select w-full p-2 border border-gray-300 rounded" tabindex="4">
                    <option>Pilih</option>
                </select>
            </div>
            <div class="mb-4">
                <label for="latitude" class="block mb-1 font-semibold">Latitude</label>
                <input type="number" step="any" id="latitude" name="latitude" required class="w-full p-2 border border-gray-300 rounded">
            </div>
            <div class="mb-4">
                <label for="longitude" class="block mb-1 font-semibold">Longitude</label>
                <input type="number" step="any" id="longitude" name="longitude" required class="w-full p-2 border border-gray-300 rounded">
            </div>
            <div class="flex gap-2 mt-6">
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Save</button>
                <a href="{{ route('shipping-zones.index') }}" class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">Back</a>
            </div>
        </div>
        <div class="w-1/2 flex flex-col items-center">
            <div class="mb-4 w-full flex flex-col items-center">
                <a onclick="getMyLocation()" class="p-2 px-4 font-bold cursor-pointer border bg-yellow-100 hover:bg-yellow-500 text-gray-600 hover:text-white rounded-xl mb-2">Get Location!</a>
                <p id="myloc" class="text-sm text-gray-600"></p>
            </div>
            <div id="map" style="width: 100%; height: 350px;" class="rounded"></div>
        </div>
    </form>
</div>

@push('scripts')
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
<link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
<script>
    // --- Map & Geolocation ---
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', myLocation);
    } else {
        myLocation();
    }

    const latitudeInput = document.getElementById('latitude');
    const longitudeInput = document.getElementById('longitude');
    var loc = document.getElementById('myloc');
    function myLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition);
        } else {
            loc.innerHTML = "Tidak bisa mendapatkan Lokasi saat ini, coba lagi!";
        }
    }
    function showPosition(position){
        loc.innerHTML = "Latitude: " + position.coords.latitude + "<br> Longitude: " + position.coords.longitude;
        if (latitudeInput && longitudeInput) {
            latitudeInput.value = position.coords.latitude;
            longitudeInput.value = position.coords.longitude;
        } else {
            console.error("Latitude or longitude input elements not found!");
        }
    }

    document.addEventListener('DOMContentLoaded', function () {
        // Initialize the map
        var map = L.map('map').setView([-6.9175, 107.6191], 13); // Default to Bandung, West Java coordinates
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '© OpenStreetMap contributors'
        }).addTo(map);
        var marker = L.marker([-6.9175, 107.6191], { draggable: true }).addTo(map);
        marker.on('dragend', function (event) {
            var latLng = marker.getLatLng();
            document.getElementById('latitude').value = latLng.lat;
            document.getElementById('longitude').value = latLng.lng;
            loc.innerHTML = "Latitude: " + latLng.lat + "<br> Longitude: " + latLng.lng;
        });
    });
</script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    // Provinsi
    fetch('/province.json')
        .then((response) => response.json())
        .then((provinces) => {
            let temp_data = `<option>Pilih</option>`;
            provinces.forEach((element) => {
                temp_data += `<option data-prov="${element.id}" value="${element.name}">${element.name}</option>`;
            });
            document.getElementById("prov").innerHTML = temp_data;
        });

    const selectProvinsi = document.getElementById('prov');
    const selectKota = document.getElementById('kota');
    const selectKecamatan = document.getElementById('kec');
    const selectKelurahan = document.getElementById('kel');

    let allKota = [];
    let allKec = [];
    let allKel = [];

    // Load all kabupaten/kota, kecamatan, kelurahan di awal
    fetch('/kotakab.json').then(r => r.json()).then(data => { allKota = data; });
    fetch('/kec.json').then(r => r.json()).then(data => { allKec = data; });
    fetch('/kel.json').then(r => r.json()).then(data => { allKel = data; });

    // Kab/Kota
    selectProvinsi.addEventListener('change', function (e) {
        const provId = e.target.options[e.target.selectedIndex].dataset.prov;
        let temp_data = `<option>Pilih</option>`;
        let filtered = allKota.filter(item => item.province_id === provId);
        filtered.forEach((element) => {
            temp_data += `<option data-regency="${element.id}" value="${element.name}">${element.name}</option>`;
        });
        selectKota.innerHTML = temp_data;
        selectKecamatan.innerHTML = '<option>Pilih</option>';
        selectKelurahan.innerHTML = '<option>Pilih</option>';
    });

    // Kecamatan
    selectKota.addEventListener('change', function (e) {
        const regencyId = e.target.options[e.target.selectedIndex].dataset.regency;
        let temp_data = `<option>Pilih</option>`;
        let filtered = allKec.filter(item => item.regency_id === regencyId);
        filtered.forEach((element) => {
            temp_data += `<option data-district="${element.id}" value="${element.name}">${element.name}</option>`;
        });
        selectKecamatan.innerHTML = temp_data;
        selectKelurahan.innerHTML = '<option>Pilih</option>';
    });

    // Kelurahan
    selectKecamatan.addEventListener('change', function (e) {
        const districtId = e.target.options[e.target.selectedIndex].dataset.district;
        let temp_data = `<option>Pilih</option>`;
        let filtered = allKel.filter(item => item.district_id === districtId);
        filtered.forEach((element) => {
            temp_data += `<option data-village="${element.id}" value="${element.name}">${element.name}</option>`;
        });
        selectKelurahan.innerHTML = temp_data;
    });
});
</script>
@endpush
@endsection 