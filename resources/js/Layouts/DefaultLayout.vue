<script setup>
import Navbar from "@/Shared/Navbar.vue";
</script>

<template>
    <Navbar />
    <main class="bg-gray-100 min-h-screen">
        <slot />
    </main>
</template>
