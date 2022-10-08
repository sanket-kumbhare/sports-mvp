<script setup>
import { ref } from 'vue'
import {
    TransitionRoot,
    TransitionChild,
    Dialog,
    DialogPanel,
    DialogTitle,
} from '@headlessui/vue'
import UserTable from "@/Components/UserTable.vue";
import InputField from "@/Components/InputField.vue";
import InputLabel from "@/Components/InputLabel.vue";
import FormButton from "@/Components/FormButton.vue";
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";

defineProps({
    button: String,
    selectedSport: Object,
    sport: Object,
});

const isOpen = ref(false)

function closeModal() {
    isOpen.value = false
}

function openModal() {
    isOpen.value = true
}
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
    <div class="fixed inset-0 flex items-center justify-center">
        <button type="button" @click="openModal"
            class="rounded-md bg-black bg-opacity-20 px-4 py-2 text-sm font-medium text-white hover:bg-opacity-30 focus:outline-none focus-visible:ring-2 focus-visible:ring-white focus-visible:ring-opacity-75">
            {{button}}
        </button>
    </div>
    <TransitionRoot appear :show="isOpen" as="template">
        <Dialog as="div" @close="closeModal" class="relative z-10">
            <TransitionChild as="template" enter="duration-300 ease-out" enter-from="opacity-0" enter-to="opacity-100"
                leave="duration-200 ease-in" leave-from="opacity-100" leave-to="opacity-0">
                <div class="fixed inset-0 bg-black bg-opacity-25" />
            </TransitionChild>

            <div class="fixed inset-0 overflow-y-auto">
                <div class="flex min-h-full items-center justify-center p-4 text-center">
                    <TransitionChild as="template" enter="duration-300 ease-out" enter-from="opacity-0 scale-95"
                        enter-to="opacity-100 scale-100" leave="duration-200 ease-in" leave-from="opacity-100 scale-100"
                        leave-to="opacity-0 scale-95">
                        <DialogPanel
                            class="w-full max-w-md transform overflow-hidden rounded-2xl bg-white p-6 text-left align-middle shadow-xl transition-all">
                            <DialogTitle as="h3" class="text-lg font-medium leading-6 text-gray-900">
                                Payment successful
                            </DialogTitle>
                            <div class="mt-2">
                                <div v-if="selectedSport">
                                    <UserTable :selectedSport="selectedSport" />
                                </div>
                                <div v-else>
                                    <div class="block row-span-1 p-6 rounded-lg shadow-lg bg-white">
                                        <form @submit.prevent="submit">
                                            <div class="form-group mb-6">
                                                <InputLabel label="Sport" />
                                                <InputField type="text" placeholder="Enter sports name"
                                                    v-model="form.sport" />
                                            </div>
                                            <FormButton type="submit" value="Add Sport" />
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-4">
                                <button type="button"
                                    class="inline-flex justify-center rounded-md border border-transparent bg-blue-100 px-4 py-2 text-sm font-medium text-blue-900 hover:bg-blue-200 focus:outline-none focus-visible:ring-2 focus-visible:ring-blue-500 focus-visible:ring-offset-2"
                                    @click="closeModal">
                                    Got it, thanks!
                                </button>
                            </div>
                        </DialogPanel>
                    </TransitionChild>
                </div>
            </div>
        </Dialog>
    </TransitionRoot>
</template>
  

  