<template>
    <div
        class="h-fit w-[500px] bg-white fixed z-10 top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 rounded-2xl flex flex-row overflow-hidden shadow-2xl">
        <div class="flex flex-col gap-2 p-5 justify-center items-center py-10 relative w-full">
            <!-- Nút quay lại -->
            <div @click="goBack"
                class="absolute top-5 left-5 w-10 h-10 flex justify-center items-center rounded-full border-2 border-black hover:bg-gray-200 hover:cursor-pointer">
                <svg class="w-full h-full text-black" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                    height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M5 12h14M5 12l4-4m-4 4 4 4" />
                </svg>
            </div>

            <!-- Logo -->
            <div class="h-32 w-32 overflow-hidden rounded-full">
                <img src="/image/phefood.png" alt="Logo" class="h-full w-full object-cover">
            </div>

            <p class="text-4xl font-bold italic">Chào mừng trở lại</p>
            <p class="text-sm">Vui lòng nhập mật khẩu mới của bạn để tiếp tục</p>

            <!-- Email -->
            <div class="flex flex-col justify-start w-full px-12">
                <p>Email</p>
                <input :value="form.email" disabled class="border h-12 rounded-xl px-2" type="email" />
            </div>

            <!-- OTP -->
            <div class="flex flex-col justify-start w-full px-12">
                <p>OTP</p>
                <input :value="form.otp" disabled class="border h-12 rounded-xl px-2" type="text" />
            </div>

            <!-- Password -->
            <div class="flex flex-col justify-start w-full px-12">
                <p>Mật khẩu mới</p>
                <input v-model="form.password" :type="showPassword ? 'text' : 'password'"
                    class="border h-12 rounded-xl px-2" placeholder="Mật khẩu mới" />
            </div>

            <!-- Password confirmation -->
            <div class="flex flex-col justify-start w-full px-12">
                <p>Xác nhận mật khẩu</p>
                <input v-model="form.passwordConfirmation" :type="showPassword ? 'text' : 'password'"
                    class="border h-12 rounded-xl px-2" placeholder="Xác nhận mật khẩu" />
            </div>

            <!-- Toggle hiển thị password -->
            <div class="flex flex-row w-full px-12 text-sm">
                <div class="flex flex-row gap-2 w-full">
                    <input type="checkbox" v-model="showPassword" class="hover:cursor-pointer" />
                    <p>Hiện mật khẩu</p>
                </div>
            </div>

            <!-- Submit -->
            <div @click="goResetPassword" class="flex flex-col w-full px-12">
                <button :disabled="loading"
                    class="bg-blue-500 text-white h-12 rounded-xl hover:bg-blue-600 font-semibold text-xl flex items-center justify-center disabled:opacity-50 disabled:cursor-not-allowed">
                    <span v-if="loading">Đang xác thực...</span>
                    <span v-else>Xác thực</span>
                </button>
            </div>

            <div class="flex flex-col w-full px-12">
                <p class="text-sm text-gray-500">Bạn chưa có tài khoản?
                    <span class="text-blue-500 hover:text-blue-900 hover:cursor-pointer" @click="goRegister">
                        Đăng ký
                    </span>
                </p>
            </div>
        </div>
    </div>
</template>

<script setup>
import { useRouter, useRoute } from 'vue-router'
import { ref, reactive, onMounted } from 'vue'
import { useToast } from 'vue-toastification'
import api from '@/services/api'

const router = useRouter()
const route = useRoute()
const toast = useToast()
const loading = ref(false)
const showPassword = ref(false)

const form = reactive({
    email: '',
    otp: '',
    password: '',
    passwordConfirmation: ''
})

onMounted(() => {
    form.email = route.query.email || ''
    form.otp = route.query.otp || ''
})

function goBack() {
    router.push({ name: 'login-customer' })
}

function goRegister() {
    router.push({ name: 'register-customer' })
}

async function goResetPassword() {
    if (!form.email) {
        toast.error("Email không hợp lệ. Vui lòng quay lại và nhập email.")
        return
    }

    if (!form.otp) {
        toast.error("OTP không hợp lệ. Vui lòng quay lại và nhập OTP.")
        return
    }

    if (!form.password || !form.passwordConfirmation) {
        toast.error("Vui lòng nhập đầy đủ mật khẩu mới và xác nhận.")
        return
    }

    if (form.password !== form.passwordConfirmation) {
        toast.error("Mật khẩu xác nhận không khớp.")
        return
    }

    loading.value = true
    try {
        await api.post('/forgot-password/reset', {
            email: form.email,
            otp: form.otp,
            password: form.password,
        })
        toast.success("Đặt lại mật khẩu thành công.")
        router.push({ name: 'login-customer' })
    } catch (error) {
        if (error.response?.data?.message) {
            toast.error(error.response.data.message)
        } else {
            toast.error("Có lỗi xảy ra khi đặt lại mật khẩu.")
        }
    } finally {
        loading.value = false
    }
}
</script>