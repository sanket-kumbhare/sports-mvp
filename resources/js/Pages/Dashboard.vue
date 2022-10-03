<script setup>
import SportCard from "@/Components/SportCard.vue";

defineProps({
    sports: Object,
});
</script>

<template>
    <div class="flex justify-around pt-24">
        <div v-for="sport in sports" :key="sport.id">
            <SportCard :sport="sport" />
        </div>
    </div>
</template>
