<script setup>
import Navbar from "@/Shared/Navbar.vue";
</script>

<template>
    <Navbar :auth="$page.props.auth" />
    <main class="bg-gray-100 min-h-screen">
        <div class="container mx-auto">
            <slot />
        </div>
    </main>
</template>
