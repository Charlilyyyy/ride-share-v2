<template>
    <div class="row mt-5 text-center">
        <div class="col-2"></div>
        <div class="col-8 card">
            <div class="card-header mt-3">
                <h4>Driver details</h4>
            </div>
            <div class="card-body">
                <FormInput 
                    :label="'Full Name'" 
                    v-model="driverData.fullName"
                    :placeholder="'Enter full name'" 
                    :size="40"
                />
                <FormInput 
                    :label="'Car Year'" 
                    v-model="driverData.carYear"
                    :placeholder="'Enter car year'" 
                    :size="40"
                />
                <FormInput 
                    :label="'Brand'" 
                    v-model="driverData.brand"
                    :placeholder="'Enter car brand'" 
                    :size="40"
                />
                <FormInput 
                    :label="'Model'" 
                    v-model="driverData.model"
                    :placeholder="'Enter car model'" 
                    :size="40"
                />
                <FormInput 
                    :label="'Color'" 
                    v-model="driverData.color"
                    :placeholder="'Enter car color'" 
                    :size="40"
                />
                <FormInput 
                    :label="'Plate number'" 
                    v-model="driverData.plateNumber"
                    :placeholder="'Enter car plate number'" 
                    :size="40"
                />
            </div>
            <div class="submit-button">
                <button @click="submitDriverData" class="btn btn-success mx-2 my-2 border-30">Submit</button>
            </div>
        </div>
        <div class="col-2"></div>
    </div>
</template>

<script setup>
import { ref,reactive } from 'vue'
import FormInput from "@rideShare/components/FormInput.vue"
import axios from 'axios'
import { useRouter } from 'vue-router'

const driverData = reactive({
    fullName: '',
    carYear: null,
    brand: '',
    model: '',
    color: '',
    plateNumber: ''
})

const submitDriverData = () => {
    const baseUrl = window.location.protocol+"//"+window.location.host+"/api/setDriverData"
    axios.post(baseUrl, driverData)
    .then((response) => {
        console.log(response)
        console.log('nice');
    })
    .catch((error) => {
        console.log(error)
    })
}

</script>

<style scoped>
.card-header{
    background-color: rgb(102, 98, 98);
}

.card-body{
    background-color: #4CAF50;
}
</style>