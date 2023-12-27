<template>
    <div class="pt-5 container">
      <h1 class="display-4 mb-4">Pick One</h1>
      <div class="overflow-hidden shadow rounded-md mx-auto text-left" style="max-width: 20rem;">
        <div class="bg-white p-4">
          <div class="d-flex justify-content-between">
            <button @click="handleStartDriving" class="btn btn-dark btn-sm rounded-pill btn-with-animation">
              Start Driving
            </button>
            <button @click="handleFindARide" class="btn btn-dark btn-sm rounded-pill btn-with-animation">
              Find A Ride
            </button>
          </div>
        </div>
      </div>
  
      <SetNameModal v-if="showModal" :userType="userType" :showModal="showModal" @closeModal="updateCloseModal" />
    </div>
  </template>
  
  <script setup>
  import SetNameModal from '@rideShare/components/SetNameModal.vue'
  import { ref } from 'vue'

  
  const showModal = ref(false)

  const userType = ref('')
  
  const updateCloseModal = (closeModal) => {
    showModal.value = closeModal
  };
  
  const handleStartDriving = () => {
    userType.value = 'driver'
    showModal.value = true
  };
  
  const handleFindARide = () => {
    userType.value = 'passenger'
    showModal.value = true
  };
  </script>
  
  <style scoped>
    .btn-with-animation {
      transition: transform 0.2s ease-in-out;
    }
  
    .btn-with-animation:hover {
      transform: scale(1.05);
    }
  </style>
  