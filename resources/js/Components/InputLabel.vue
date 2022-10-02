<script setup>
defineProps({
    label: String,
});
</script>

<template>
    <label for="input" class="form-label inline-block mb-2 text-gray-700">{{
        label
    }}</label>
</template>
