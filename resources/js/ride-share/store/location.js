import { ref,reactive } from 'vue'
import { defineStore } from 'pinia'

export const useLocationStore = defineStore('location', () => {
    const passengerDestination = reactive({
        name: '',
        address: '',
        geometry: {
            lat: null,
            lng: null
        }
    })

    const setPassengerDestination = (data) => {
        Object.assign(passengerDestination,data)
    }

    return {
        passengerDestination,
        setPassengerDestination
    }
})