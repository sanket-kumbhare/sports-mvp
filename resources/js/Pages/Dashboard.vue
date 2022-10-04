<script setup>
import SportCard from "@/Components/SportCard.vue";

defineProps({
    sports: Object,
    subscriptions: Object,
});
</script>

<template>
    <div class="flex justify-around gap-4 pt-24">
        <div v-for="sport in sports" :key="sport.id">
            <SportCard :sport="sport" :subscriptions="subscriptions" />
        </div>
    </div>
</template>
