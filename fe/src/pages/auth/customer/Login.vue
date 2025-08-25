<template>
    <div
        class="h-fit w-[1000px] bg-white fixed z-10 top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 rounded-2xl flex flex-row overflow-hidden shadow-2xl">
        <div class="flex-1 flex flex-col gap-2 p-5 justify-center items-center py-10 relative">
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

            <p class="text-4xl font-bold italic text-center">Chào mừng trở lại</p>
            <p class="text-sm">Vui lòng nhập thông tin để đăng nhập</p>

            <div class="flex flex-col justify-start w-full px-12">
                <p>Email</p>
                <input v-model="form.email" class="border h-12 rounded-xl px-2" type="email" name="email" id="email"
                    placeholder="E-mail">
            </div>

            <div class="flex flex-col justify-start w-full px-12">
                <p>Mật khẩu</p>
                <input v-model="form.password" :type="showPassword ? 'text' : 'password'"
                    class="border h-12 rounded-xl px-2" placeholder="Mật khẩu" id="password" name="password">
            </div>

            <div class="flex flex-row w-full px-12 text-sm">
                <div class="flex flex-row gap-2 w-full flex-1">
                    <input type="checkbox" v-model="showPassword" class="hover:cursor-pointer">
                    <p>Hiển thị mật khẩu</p>
                </div>

                <div @click="goForgotPassword" class="text-blue-500 hover:text-blue-900 hover:cursor-pointer">
                    <p>Quên mật khẩu?</p>
                </div>
            </div>

            <div class="flex flex-col w-full px-12">
                <button @click="Login" :disabled="loading"
                    class="bg-blue-500 text-white h-12 rounded-xl hover:bg-blue-600 font-semibold text-xl flex items-center justify-center disabled:opacity-50 disabled:cursor-not-allowed">
                    <span v-if="loading">Đang đăng nhập...</span>
                    <span v-else>Đăng nhập</span>
                </button>
            </div>

            <div class="flex flex-col w-full px-12">
                <p class="text-sm text-gray-500">Bạn chưa có tài khoản?
                    <span class="text-blue-500 hover:text-blue-900 hover:cursor-pointer" @click="goRegister">Đăng
                        ký</span>
                </p>
            </div>
        </div>

        <div class="flex-1 bg-form"></div>
    </div>
</template>

<script setup>
import { useRouter } from 'vue-router';
import { ref, reactive } from 'vue';
import api from '@/services/api';
import { useToast } from 'vue-toastification';
import { useStore } from 'vuex';

const router = useRouter();
const toast = useToast();
const store = useStore();

const loading = ref(false);
const showPassword = ref(false);

const form = reactive({
    email: '',
    password: '',
});

async function Login() {
    if (!form.email) {
        toast.error("Vui lòng nhập email");
        return;
    }

    if (!form.password) {
        toast.error("Vui lòng nhập mật khẩu");
        return;
    }

    loading.value = true;

    try {
        const response = await api.post('/login-customer', {
            email: form.email,
            password: form.password,
        });

        const clientData = {
            ...response.data.user,
            token: response.data.token,
        };

        if (clientData.status === 0 || clientData.is_active === 0) {
            toast.info("Tài khoản chưa được kích hoạt. Vui lòng xác thực OTP.");

            router.push({
                name: 'verify-register-customer',
                query: { email: clientData.email }
            });
            return;
        }

        store.dispatch("client/login", clientData);
        localStorage.setItem("client", JSON.stringify(clientData));

        toast.success("Đăng nhập thành công!");
        router.push({ name: 'home' });

    } catch (error) {
        if (error.response?.data?.message) {
            toast.error(error.response.data.message);
        } else {
            toast.error("Đã xảy ra lỗi khi đăng nhập");
        }
    } finally {
        loading.value = false;
    }
}


function goRegister() {
    router.push({ name: 'register-customer' });
}

function goForgotPassword() {
    router.push({ name: 'forgot-password' });
}

function goBack() {
    router.push({ name: 'home' });
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