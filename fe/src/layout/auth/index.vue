<template>
    <div class="bg-main w-full h-screen relative">
        <router-view></router-view>
    </div>
</template>

<script setup>
</script>

<style scoped>
.bg-main {
    background-image: url('/image/bg1.jpg');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
}
</style>
