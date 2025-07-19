<template>
    <div class="container">
        <h3 class="mt-5">Rute Pencarian</h3>
        <div class="card px-3">

            <div class="card-body">
                <label for="">Rute Awal</label>
                <select v-model="ruteForm.rute_awal" class="form-control" id="">
                    <option v-for="data in halte" :value="data.id">
                        {{ data.nama_halte }}
                    </option>
                </select>

                <label for="">Rute Akhir</label>
                <select v-model="ruteForm.rute_akhir" class="form-control" id="">
                    <option v-for="data in halte" :value="data.id">
                        {{ data.nama_halte }}
                    </option>
                </select>
                <div id="map" style="height:90vh; margin-top: 50px;"></div>
                <p class="mt-3">Performa pencarian : {{ performance_time }} ms</p>


                <button class="btn btn-success" @click="cari_rute">Cari Rute</button>
            </div>
        </div>
    </div>

</template>

<script setup>
import axios from 'axios'
import { ref, onMounted } from 'vue'
import "leaflet/dist/leaflet.css"
import "leaflet/dist/leaflet.css";
import * as L from 'leaflet';

const mapContainer = ref(null); // container map dasar
let performance_time = ref(0)
const coordAwal = ref([])
const coordAkhir = ref([])
const coordStop = ref([])

const ruteForm = ref({
    rute_awal: '',
    rute_akhir: ''
})
const cari_rute = async () => {
    // alert(ruteForm.value.rute_awal)
    const startTime = performance.now();
    axios.post('./api/search-route', {
        awal: ruteForm.value.rute_awal,
        akhir: ruteForm.value.rute_akhir
    }
    )
        .then(response => {
            console.log(response)
            coordAwal.value = response.data.koordinat_awal
            coordAkhir.value = response.data.koordinat_akhir
            coordStop.value = response.data.koordinat_stop
            // console.log(coordStop.value)
            if (mapContainer.value != null) {
                mapContainer.value.remove()
                mapContainer.value = null
            }
            if (response.data.status == 1) {
                mapContainer.value = L.map('map').setView([-7.32702, 112.79706], 6); // inisiasi container map dengan default location disini

                //    konfigurasi layer osm untuk menampilkan view peta
                L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    maxZoom: 19,
                    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
                }).addTo(mapContainer.value);
                // L.marker([-7.32702, 112.79706]).addTo(mapContainer.value) //markser statis
                L.marker([coordAwal.value.latitude, coordAwal.value.longitude]).bindPopup(coordAwal.value.nama_halte).addTo(mapContainer.value)
                if (coordStop.value.length > 0) {
                    // alert('here')
                    coordStop.value.forEach(function (val) {
                        // console.log(val.latitude);
                        L.marker([val.latitude, val.longitude]).bindPopup(val.nama_halte).addTo(mapContainer.value)
                    })
                }
                L.marker([coordAkhir.value.latitude, coordAkhir.value.longitude]).bindPopup(coordAkhir.value.nama_halte).addTo(mapContainer.value)

            } else {
                alert(response.data.pesan)
                mapContainer.value = L.map('map').setView([-6.200000, 106.816666], 6); // inisiasi container map dengan default location disini

                //    konfigurasi layer osm untuk menampilkan view peta
                L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    maxZoom: 19,
                    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
                }).addTo(mapContainer.value);
            }
            const endTime = performance.now();
            const duration = endTime - startTime;
            performance_time.value = Math.ceil(duration)
        })

        .catch(error => alert(error))
}

defineProps({
    halte: Array
})

const loadMap = () => {


}
onMounted(() => {
    // mapContainer.value = L.map('map').setView([-7.32702, 112.79706], 6); // inisiasi container map dengan default location disini

    // //    konfigurasi layer osm untuk menampilkan view peta
    // L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    //     maxZoom: 19,
    //     attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    // }).addTo(mapContainer.value);
    // // L.marker([-7.32702, 112.79706]).addTo(mapContainer.value) //markser statis

});
</script>
