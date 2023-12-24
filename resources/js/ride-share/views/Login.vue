<template>
    <h1>Login</h1>

    <div class="text-center mt-5 center-container">
        <div class="card">
            <div class="text-center card-header"><h4 class="text-success fw-bold">login form</h4></div>
            <div class="card-body mx-4 my-2">
                <div class="phone-attr">
                    <label class="me-2">Phone Number: </label>
                    <input v-model="credentials.phone" size="20" type="text" name="phone-num" placeholder="011-61820154"/>
                </div>
                <div class="req-code-btn mt-4">
                    <button class="btn btn-secondary" @click="handleReqCode()">Send Code</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { reactive } from 'vue'
import { vMaska } from 'maska'
import axios from 'axios'

const credentials = reactive({
    phone: null,
    login_code: null
})

const handleReqCode = () => {
    const baseURL = window.location.protocol+"//"+window.location.host+"/api/login"
    axios.post(baseURL, credentials)
        .then((response) => {
            console.log(response.data)
        })
        .catch((error) => {
            console.log(error)
            console.log(error.response.data.message)
            alert(error.response.data.message)
        })
}

</script>

<style scoped>
  .center-container {
    display: flex;
    justify-content: center;
    align-items: center;
    /* height: 100vh; Optional: Set a specific height for centering within the viewport */
  }
</style>


