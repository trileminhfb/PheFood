<template>
    <div
        class="h-fit w-[500px] bg-white fixed z-10 top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 rounded-2xl flex flex-row overflow-hidden shadow-2xl">
        <div class="flex flex-col gap-2 p-5 justify-center items-center py-10 relative w-full">
            <div @click="goBack"
                class="absolute top-5 left-5 w-10 h-10 flex justify-center items-center rounded-full border-2 border-black hover:bg-gray-200 hover:cursor-pointer">
                <svg class="w-full h-full text-black" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                    height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M5 12h14M5 12l4-4m-4 4 4 4" />
                </svg>
            </div>

            <div class="h-32 w-32 overflow-hidden rounded-full">
                <img src="/image/phefood.png" alt="Logo" class="h-full w-full object-cover">
            </div>

            <p class="text-4xl font-bold italic">Chào mừng trở lại</p>
            <p class="text-sm">Vui lòng nhập E-Mail của bạn để tiếp tục</p>

            <div class="flex flex-col justify-start w-full px-12">
                <p>Email</p>
                <input v-model="form.email" class="border h-12 rounded-xl px-2" type="email" name="email" id="email"
                    placeholder="E-mail" />
            </div>

            <div @click="goVerify" class="flex flex-col w-full px-12">
                <button :disabled="loading"
                    class="bg-blue-500 text-white h-12 rounded-xl hover:bg-blue-600 font-semibold text-xl flex items-center justify-center">
                    <span v-if="loading">Đang xác thực...</span>
                    <span v-else>Xác thực</span>
                </button>
            </div>

            <div class="flex flex-col w-full px-12">
                <p class="text-sm text-gray-500">
                    Bạn chưa có tài khoản?
                    <span class="text-blue-500 hover:text-blue-900 hover:cursor-pointer" @click="goRegister">Đăng
                        ký</span>
                </p>
            </div>
        </div>
    </div>
</template>

<script setup>
import { ref, reactive } from 'vue'
import { useRouter } from 'vue-router'
import { useToast } from 'vue-toastification'
import api from '@/services/api'

const form = reactive({
    email: '',
})

const loading = ref(false)
const router = useRouter()
const toast = useToast()

function goBack() {
    router.push({ name: 'login-customer' })
}

function goRegister() {
    router.push({ name: 'register-customer' })
}

async function goVerify() {
    if (!form.email) {
        toast.error("Vui lòng nhập email")
        return
    }

    loading.value = true

    try {
        const response = await api.post('/forgot-password', {
            email: form.email
        })

        toast.success("Mã OTP đã được gửi đến email của bạn")
        router.push({
            name: 'verify-otp-forgot-password',
            query: { email: form.email }
        })
    } catch (error) {
        if (error.response?.data?.message) {
            toast.error(error.response.data.message)
        } else {
            toast.error("Đã xảy ra lỗi khi gửi OTP")
        }
    } finally {
        loading.value = false
    }
}
</script>