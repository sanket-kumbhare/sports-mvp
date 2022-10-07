<script setup>
import InputField from "@/Components/InputField.vue";
import InputLabel from "@/Components/InputLabel.vue";
import FormButton from "@/Components/FormButton.vue";
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";

const props = defineProps({
    sport: Object,
});

const form = useForm({
    sport: props.sport.sport,
});

const submit = () => {
    form.put(`/admin-panel/sport/${props.sport.id}`, {
        onFinish: () => form.reset("sport"),
    });
};
</script>

<template>
    <div class="pt-20 w-1/3">
        <div class="block row-span-1 p-6 rounded-lg shadow-lg bg-white">
            <form @submit.prevent="submit">
                <div class="form-group mb-6">
                    <InputLabel label="Sport" />
                    <InputField
                        type="text"
                        placeholder="Enter sports name"
                        v-model="form.sport"
                    />
                </div>
                <FormButton type="submit" value="Add Sport" />
            </form>
        </div>
    </div>
</template>
