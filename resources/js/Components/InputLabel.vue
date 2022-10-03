<script setup>
defineProps({
    label: String,
    inputid: String,
});
</script>

<template>
    <label class="form-label inline-block mb-2 text-gray-700" :for="inputid">{{
        label
    }}</label>
</template>
