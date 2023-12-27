import { ref,reactive } from 'vue'
import { defineStore } from 'pinia'

export const useCredentialsStore = defineStore('', () => {
    
    const credentialsUser = reactive({
        name: '',
        phone: null
    })

    return {
        credentialsUser
    }
})