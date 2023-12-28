import { ref,reactive } from 'vue'
import { defineStore } from 'pinia'

export const useCredentialsStore = defineStore('', () => {
    
    const credentialsUser = reactive({
        name: '',
        phone: null,
    })

    const setUser = (userData) => {
        Object.assign(credentialsUser,userData)
    }

    return {
        credentialsUser,
        setUser
    }
})