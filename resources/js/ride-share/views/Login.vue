<template>
    <h1>Login</h1>

    <div v-if="!waitingOnVerification" class="text-center mt-5 center-container">
        <div class="card">
            <div class="text-center card-header"><h4 class="text-success fw-bold">login form</h4></div>
            <div class="card-body mx-4 my-2">
                <div class="phone-attr">
                    <label class="me-2">Phone Number: </label>
                    <input v-model="credentials.phone" size="20" type="text" name="phone_num" placeholder="011-61820154"/>
                </div>
                <div class="req-code-btn mt-4">
                    <button class="btn btn-secondary" @click="handleReqCode()">Send Code</button>
                </div>
            </div>
        </div>
    </div>
    <div v-else class="text-center mt-5 center-container">
        <div class="card">
            <div class="text-center card-header"><h4 class="text-success fw-bold">Verify Code</h4></div>
            <div class="card-body mx-4 my-2">
                <div class="phone-attr">
                    <label class="me-2">Code: </label>
                    <input v-maska data-maska="######" v-model="credentials.login_code" size="6" max="6" type="text" name="verification_code" placeholder="xxxxxx"/>
                </div>
                <div class="req-code-btn mt-4">
                    <button class="btn btn-secondary" @click="handleVerifyCode()">Verify Code</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { reactive,ref,onMounted } from 'vue'
import { vMaska } from 'maska'
import axios from 'axios'
import { useRouter } from 'vue-router'
import { useCredentialsStore } from '@rideShare/store/credentials.js'

const router = useRouter()

const { credentialsUser,setUser } = useCredentialsStore()

onMounted(() => {
    if(localStorage.getItem('token')){
        router.push({
            name: 'dashboard'
        })
    }
})

const credentials = {
    phone: null,
    login_code: null
}

const waitingOnVerification = ref(false)

const handleReqCode = () => {
    const baseURL = window.location.protocol+"//"+window.location.host+"/api/login"
    axios.post(baseURL, credentials)
        .then((response) => {
            console.log(response.data)
            waitingOnVerification.value = true
        })
        .catch((error) => {
            console.log(error)
            console.log(error.response.data.message)
            alert(error.response.data.message)
        })
}

const handleVerifyCode = () => {
    const baseURL = window.location.protocol+"//"+window.location.host+"/api/login/verify"
    // const userCred = useCredentialsStore()
    axios.post(baseURL, credentials)
        .then((response) => {
            localStorage.setItem('token', response.data)
            // userCred.$patch({
            //     credentialsUser: {
            //         phone: credentials.phone
            //     }
            // })
            setUser({
                phone: credentials.phone
            })
            router.push({
                name: 'dashboard'
            })
        })
        .catch((error) => {
            console.log(error.response.data.message);
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


