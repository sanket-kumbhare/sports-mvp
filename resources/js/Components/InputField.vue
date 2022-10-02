<script setup>
defineProps({
    type: String,
    placeholder: String,
    modelValue: {
        type: String,
    },
});
</script>

<template>
    <input
        :type="type"
        class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
        id="input"
        :value="modelValue"
        @input="$emit('update:modelValue', $event.target.value)"
        ref="input"
        :placeholder="placeholder"
    />
</template>
