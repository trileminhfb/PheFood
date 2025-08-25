<template>
    <div
        class="h-fit w-[1000px] bg-white fixed z-10 top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 rounded-2xl flex flex-row overflow-hidden shadow-2xl">
        <div class="flex-1 bg-form relative">
            <div @click="goLogin"
                class="absolute top-5 left-5 w-10 h-10 flex justify-center items-center rounded-full border-2 border-white hover:bg-gray-800 hover:cursor-pointer">
                <svg class="w-full h-full text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                    height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M5 12h14M5 12l4-4m-4 4 4 4" />
                </svg>
            </div>
        </div>

        <div class="flex-1 flex flex-col gap-2 p-5 justify-center items-center py-10">
            <div class="h-32 w-32 overflow-hidden rounded-full">
                <img src="/image/phefood.png" alt="Logo" class="h-full w-full object-cover">
            </div>

            <p class="text-4xl font-bold italic text-center">Chào mừng bạn đến với PheFood</p>
            <p class="text-sm">Vui lòng đăng nhập để tiếp tục</p>

            <div class="flex flex-col justify-start w-full px-12">
                <p>Họ và Tên</p>
                <input v-model="form.name" class="border h-12 rounded-xl px-2" type="text" name="name" id="name"
                    placeholder="Họ và Tên">
            </div>

            <div class="flex flex-col justify-start w-full px-12">
                <p>Ngày sinh</p>
                <input v-model="form.Birth" class="border h-12 rounded-xl px-2" type="date" name="birth" id="birth">
            </div>

            <div class="flex flex-col justify-start w-full px-12">
                <p>Email</p>
                <input v-model="form.email" class="border h-12 rounded-xl px-2" type="email" name="email" id="email"
                    placeholder="E-mail">
            </div>

            <div class="flex flex-col justify-start w-full px-12">
                <p>Số điện thoại</p>
                <input v-model="form.Phone" @input="form.Phone = form.Phone.replace(/\D/g, '')" inputmode="numeric"
                    class="border h-12 rounded-xl px-2" type="text" name="phone" id="phone" placeholder="Số điện thoại">
            </div>

            <div class="flex flex-col justify-start w-full px-12">
                <p>Mật khẩu</p>
                <input v-model="form.password" :type="showPassword ? 'text' : 'password'"
                    class="border h-12 rounded-xl px-2" placeholder="Mật khẩu" id="password" name="password">
            </div>

            <div class="flex flex-col justify-start w-full px-12">
                <p>Xác nhận mật khẩu</p>
                <input v-model="form.password_confirmation" :type="showPassword ? 'text' : 'password'"
                    class="border h-12 rounded-xl px-2" placeholder="Xác nhận mật khẩu" id="password_confirmation"
                    name="password_confirmation">
            </div>

            <div class="flex flex-row w-full px-12 text-sm">
                <div class="flex flex-row gap-2 w-full">
                    <input type="checkbox" v-model="showPassword" class="hover:cursor-pointer">
                    <p>Hiện mật khẩu</p>
                </div>
            </div>

            <div @click="goVerify" class="flex flex-col w-full px-12">
                <button :disabled="loading"
                    class="bg-blue-500 text-white h-12 rounded-xl hover:bg-blue-600 font-semibold text-xl flex items-center justify-center disabled:opacity-50 disabled:cursor-not-allowed">
                    <span v-if="loading">Đang đăng ký...</span>
                    <span v-else>Đăng ký</span>
                </button>
            </div>

            <div class="flex flex-col w-full px-12">
                <p class="text-sm text-gray-500">Bạn đã có tài khoản?
                    <span class="text-blue-500 hover:text-blue-900 hover:cursor-pointer" @click="goLogin">Đăng
                        nhập</span>
                </p>
            </div>
        </div>
    </div>
</template>

<script setup>
import { useRouter } from 'vue-router';
import { ref, reactive } from 'vue';
import api from '@/services/api';
import { useToast } from 'vue-toastification';

const router = useRouter();
const toast = useToast();
const loading = ref(false);
const showPassword = ref(false);

const form = reactive({
    name: '',
    email: '',
    password: '',
    password_confirmation: '',
    Phone: '',
    Birth: '',
});

function goLogin() {
    router.push({ name: 'login-customer' });
}

async function goVerify() {
    if (!form.name) {
        toast.error("Vui lòng nhập họ và tên");
        return;
    }
    if (!form.email) {
        toast.error("Vui lòng nhập email");
        return;
    }
    if (!form.Phone) {
        toast.error("Vui lòng nhập số điện thoại");
        return;
    }
    if (!form.Birth) {
        toast.error("Vui lòng nhập ngày sinh");
        return;
    }
    if (!form.password || !form.password_confirmation) {
        toast.error("Vui lòng nhập mật khẩu và xác nhận mật khẩu");
        return;
    }
    if (form.password !== form.password_confirmation) {
        toast.error("Mật khẩu xác nhận không khớp");
        return;
    }

    loading.value = true;

    try {
        const response = await api.post('/register', {
            name: form.name,
            email: form.email,
            password: form.password,
            password_confirmation: form.password_confirmation,
            Phone: form.Phone,
            Birth: form.Birth,
        });

        toast.success("Mã OTP đã được gửi đến email của bạn");
        router.push({
            name: 'verify-register-customer',
            query: { email: form.email }
        });
    } catch (error) {
        if (error.response?.data?.message) {
            toast.error(error.response.data.message);
        } else {
            toast.error("Đã xảy ra lỗi khi đăng ký");
        }
    } finally {
        loading.value = false;
    }
}
</script>

<style scoped>
.bg-form {
    position: relative;
    overflow: hidden;
}

.bg-form::before {
    content: "";
    position: absolute;
    inset: 0;
    background-image: url('/image/bg2.jpg');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    transform: scaleX(-1);
    z-index: -1;
}
</style>