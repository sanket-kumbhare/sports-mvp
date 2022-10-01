<script setup>
import Navbar from "@/Shared/Navbar.vue";
</script>

<template>
    <Navbar />
    <main class="bg-gray-200">
        <slot />
    </main>
</template>
