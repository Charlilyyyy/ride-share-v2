<template>
    <div id="setNameModal" class="setNameModal" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog modal-sm my-4 py-4 px-4">
        <div class="modal-content">
          <div class="modal-header mb-2">
            <h5 class="modal-title">Please enter your name</h5>
            <button type="button" @click="closeModal" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body mb-3">
            <label class="me-2">Name : </label>
            <input v-model="name" size="22" type="text" placeholder="Enter your name" />
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-success" @click="proceed">Proceed</button>
            {{ props }}
          </div>
        </div>
      </div>
    </div>
</template>
  
<script setup>
import { defineProps, defineEmits , ref } from 'vue'
import axios from 'axios'
import { useCredentialsStore } from '@rideShare/store/credentials.js'
import { useRouter } from 'vue-router';
  
const props = defineProps([
    'showModal',
    'userType'
])
  
const emits = defineEmits()

const router = useRouter()

const name = ref('')
  
const closeModal = () => {
    emits('closeModal', false)
}
  
const proceed = () => {
    const baseURL = window.location.protocol+"//"+window.location.host+"/api/setName"
    const userCred = useCredentialsStore()
    userCred.$patch({
                credentialsUser: {
                    name: name
                }
            })
            console.log(userCred.credentialsUser);
    axios.post(baseURL,userCred.credentialsUser)
        .then((response) => {
            console.log(response)
            if(props.userType == 'driver'){
                router.push ({
                    name: 'driver'
                })
            }else if(props.userType == 'passenger'){
                router.push ({
                    name: 'passenger'
                })
            }
        })
        .catch((error) => {
            console.log(error)
        })
    closeModal()
}
</script>
  
 <style>
    /* Add custom styles for the modal */
    .modal-dialog {
      border: 2px solid #ccc;
      background-color: #4CAF50;
    }
  
    .center-container {
      display: flex;
      justify-content: center;
      align-items: center;
    }
</style>
  