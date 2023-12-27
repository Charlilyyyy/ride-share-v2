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
                    <FormInput
                        :size="50"
                    />
                </div>
            </div>
        </div>
        <div class="col-3"></div>
    </div>
</template>

<script setup>
import { ref,reactive } from 'vue'
import FormInput from "@rideShare/components/FormInput.vue"
</script>