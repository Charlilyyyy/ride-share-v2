<template>
    <h1>passenger</h1>
    <div class="row text-center">
        <div class="col-3"></div>
        <div class="col-6">
            <div class="card mt-5">
                <div class="card-header">
                    <h4>Enter your location</h4>
                </div>
                <div class="card-body mt-2">
                    <!-- <FormInput
                        :size="50"
                        @change="handleInputChange"
                        v-model="inputValue"
                        id="okk"
                    /> -->
                    <input
                        type="text"
                        size="50"
                        @place_changed="handleInputChange"
                        id="address-input"
                    />
                    <div class="find-ride-button">
                        <button @click="handleFindRide" class="btn btn-primary border-30 mt-3 ">Find a ride</button>
                    </div>
                    <div id="map"></div>
                </div>
            </div>
        </div>
        <div class="col-3"></div>
    </div>
    {{ destination }}
</template>

<script setup>
import { ref,reactive,onMounted,nextTick} from 'vue'
import { useLocationStore } from '@rideShare/store/location';
import FormInput from "@rideShare/components/FormInput.vue"
import { useRouter } from 'vue-router';
import axios from 'axios'

    // const location = useLocationStore()

    const destination = reactive({
        name: '',
        address: '',
        geometry: {
            lat: null,
            lng: null
        }
    })

    const router = useRouter()

    const { setPassengerDestination } = useLocationStore()

    const handleFindRide = () => {
        console.log(destination.geometry);
        // setPassengerDestination({
        //     name: destination.name,
        //     address: destination.address,
        //     geometry: {
        //         lat: destination.geometry.lat,
        //         lng: destination.geometry.lng
        //     }
        // })
        const { name, address, geometry } = destination;
        setPassengerDestination({ name, address, geometry })
    }

    onMounted(() => {
    const autocomplete = new google.maps.places.Autocomplete(document.getElementById("address-input"), {
    //   types: ['address'],
    //   fields: ['address_components'],
    });

    //next version please apply async

    autocomplete.addListener('place_changed', () => {
          const place = autocomplete.getPlace();
          if (!place.geometry) {
            // User entered the name of a Place that was not suggested and
            // pressed the Enter key, or the Place Details request failed.
            window.alert(`No details available for input: '${place.name}'`);
            return;
          }
          
          destination.name = place.name
          destination.address = place.formatted_address
          destination.geometry.lat = place.geometry.location.lat()
          destination.geometry.lng = place.geometry.location.lng()
        //   console.log(place);
    });
});

</script>