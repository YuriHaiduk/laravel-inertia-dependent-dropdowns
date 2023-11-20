<template>
    <div class="flex items-center justify-center h-screen bg-gray-100">
        <div class="bg-white p-6 rounded-lg shadow-md w-80">
            <h1 class="text-2xl font-bold mb-4">Add Destination</h1>
            <div class="mb-4">
                <vue3-select
                    id="country"
                    v-model="selectedCountry"
                    :options="countryOptions"
                    label="name"
                    value="id"
                    placeholder="Select Country"
                ></vue3-select>
            </div>
            <div class="mb-4">
                <vue3-select
                    id="city"
                    v-model="selectedCity"
                    :options="cityOptions"
                    label="name"
                    value="id"
                    placeholder="Select City"
                    :disabled="citySelectDisabled"
                ></vue3-select>
            </div>
            <div class="mb-4">
                <vue3-select
                    id="airport"
                    :options="airportOptions"
                    label="name"
                    value="id"
                    placeholder="Select Airport"
                    :disabled="airportSelectDisabled"
                ></vue3-select>
            </div>
        </div>
    </div>
</template>

<script>
import Vue3Select from 'vue3-select';
import axios from 'axios';

export default {
    components: {
        Vue3Select,
    },
    props: {
        countries: Object,
    },
    data() {
        return {
            selectedCountry: null,
            selectedCity: null,
            countryOptions: this.countries,
            cityOptions: [],
            airportOptions: [],
            citySelectDisabled: true,
            airportSelectDisabled: true,
        };
    },
    watch: {
        selectedCountry(newCountry) {
            try {
                if (newCountry) {
                    this.fetchCities(newCountry.id);
                }
            } catch (error) {
                console.error('Error in watcher callback:', error);
            }
        },
        selectedCity(newCity) {
            try {
                if (newCity) {
                    this.fetchAirports(newCity.id);
                }
            } catch (error) {
                console.error('Error in watcher callback:', error);
            }
        },
    },
    methods: {
        fetchCities(countryId) {
            if (countryId) {
                axios.get(route('form.getCities', {countryId}))
                    .then((response) => {
                        this.cityOptions = response.data;
                        this.citySelectDisabled = false;
                    })
                    .catch((error) => {
                        console.error(error);
                    });
            } else {
                this.citySelectDisabled = true;
                this.cityOptions = [];
            }
        },
        fetchAirports(cityId) {
            if (cityId) {
                axios.get(route('form.getAirports', {cityId}))
                    .then((response) => {
                        this.airportOptions = response.data;
                        this.airportSelectDisabled = false;
                    })
                    .catch((error) => {
                        console.error(error);
                    });
            } else {
                this.airportSelectDisabled = true;
                this.airportOptions = [];
            }
        },
    },
};
</script>
