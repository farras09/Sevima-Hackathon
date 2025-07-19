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
                <p class="mt-3">Performa pencarian : </p>


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

const ruteForm = ref({
    rute_awal: '',
    rute_akhir: ''
})
const cari_rute = async () => {
    // alert(ruteForm.value.rute_awal)
    axios.post('./api/search-route', {
        awal: ruteForm.value.rute_awal,
        akhir: ruteForm.value.rute_akhir
    }
    )
        .then(response => {
            console.log(response)
        })
        .catch(error => alert(error))
}

defineProps({
    halte: Array
})

onMounted(() => {
    mapContainer.value = L.map('map').setView([-7.32702, 112.79706], 6); // inisiasi container map dengan default location disini

    //    konfigurasi layer osm untuk menampilkan view peta
    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    }).addTo(mapContainer.value);
    L.marker([-7.32702, 112.79706]).addTo(mapContainer.value) //markser statis
});
</script>
