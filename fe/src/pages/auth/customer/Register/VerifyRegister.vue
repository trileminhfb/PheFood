<template>
    <div
        class="h-fit w-[1000px] bg-white fixed z-10 top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 rounded-2xl flex flex-row overflow-hidden shadow-2xl">
        <div class="flex-1 bg-form relative">
            <div @click="goBack"
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
            <p class="text-sm">Vui lòng nhập OTP đã gửi để hoàn tất đăng ký</p>

            <div class="flex flex-col justify-start w-full px-12">
                <p>Email</p>
                <input class="border h-12 rounded-xl px-2" type="email" name="email" id="email" :value="form.email"
                    disabled>
            </div>

            <div class="flex flex-col justify-start w-full px-12">
                <p>OTP</p>
                <input v-model="form.otp" @input="form.otp = form.otp.replace(/\D/g, '')" inputmode="numeric"
                    pattern="\d*" maxlength="6" class="border h-12 rounded-xl px-2" type="text" name="otp" id="otp"
                    placeholder="OTP" />
                <p @click="handleResendOTP"
                    class="text-blue-500 hover:text-blue-900 hover:cursor-pointer text-sm w-fit">
                    <span v-if="loadingResend">Đang gửi lại OTP...</span>
                    <span v-else>Gửi lại OTP</span>
                </p>
            </div>

            <div class="flex flex-col w-full px-12">
                <button @click="handleVerifyOTP" :disabled="loadingVerify"
                    class="bg-blue-500 text-white h-12 rounded-xl hover:bg-blue-600 font-semibold text-xl flex items-center justify-center disabled:opacity-50 disabled:cursor-not-allowed">
                    <span v-if="loadingVerify">Đang xác thực...</span>
                    <span v-else>Xác thực</span>
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
import { useRouter, useRoute } from 'vue-router';
import { ref, reactive, onMounted } from 'vue';
import api from '@/services/api';
import { useToast } from 'vue-toastification';

const router = useRouter();
const route = useRoute();
const toast = useToast();

const form = reactive({
    email: '',
    otp: '',
});

const loadingResend = ref(false);
const loadingVerify = ref(false);

onMounted(() => {
    form.email = route.query.email || '';
});

function goLogin() {
    router.push({ name: 'login-customer' });
}

function goBack() {
    router.push({ name: 'home' });
}

async function handleVerifyOTP() {
    if (!form.otp || form.otp.length !== 6) {
        toast.error("Vui lòng nhập mã OTP hợp lệ (6 chữ số).");
        return;
    }

    loadingVerify.value = true;

    try {
        const response = await api.post('/register/verify-otp', {
            email: form.email,
            otp: form.otp
        });

        toast.success("Đăng kí tài khoản thành công.");
        toast.success("Kích hoạt tài khoản thành công.");
        router.push({ name: 'login-customer' });
    } catch (error) {
        if (error.response?.data?.message) {
            toast.error(error.response.data.message);
        } else {
            toast.error("Đã xảy ra lỗi khi xác thực OTP");
        }
    } finally {
        loadingVerify.value = false;
    }
}

async function handleResendOTP() {
    if (!form.email) {
        toast.error("Email không hợp lệ. Vui lòng quay lại và nhập email.");
        return;
    }

    loadingResend.value = true;

    try {
        await api.post('/register/resend-otp', { email: form.email });
        toast.success("Đã gửi lại OTP đến email");
    } catch (error) {
        if (error.response?.data?.message) {
            toast.error(error.response.data.message);
        } else {
            toast.error("Không thể gửi lại OTP");
        }
    } finally {
        loadingResend.value = false;
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