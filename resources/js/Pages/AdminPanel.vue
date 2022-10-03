<script setup>
import InputField from "@/Components/InputField.vue";
import InputLabel from "@/Components/InputLabel.vue";
import FormButton from "@/Components/FormButton.vue";
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";

const form = useForm({
    sport: "",
});

defineProps({
    sports: Object,
});

const submit = () => {
    form.post("/admin-panel/sport", {
        onFinish: () => form.reset("sport"),
    });
};

// const destroy = (id) => {
//     if (confirm("Are you sure you want to Delete")) {
//         Inertia.delete(`/admin-panel/sport/${id}`);
//     }
// };
</script>

<template>
    <div class="container mx-auto">
        <div
            class="grid grid-rows-3 grid-flow-col gap-4 pt-24 max-h-full h-5/6"
        >
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
            <div class="row-span-2 bg-green-500">graph region</div>
            <div
                class="block row-span-3 p-6 col-span-2 rounded-lg shadow-lg bg-white overflow-y-auto overflow-x-hidden"
            >
                <div class="flex flex-col">
                    <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div
                            class="py-2 inline-block min-w-full sm:px-6 lg:px-8"
                        >
                            <div class="overflow-hidden">
                                <table class="min-w-full">
                                    <thead class="border-b">
                                        <tr>
                                            <th
                                                scope="col"
                                                class="text-sm font-medium text-gray-900 px-6 py-4 text-left"
                                            >
                                                #
                                            </th>
                                            <th
                                                scope="col"
                                                class="text-sm font-medium text-gray-900 px-6 py-4 text-left"
                                            >
                                                Sport Name
                                            </th>
                                            <th
                                                colspan="2"
                                                scope="col"
                                                class="text-sm font-medium text-gray-900 px-6 py-4 text-left"
                                            >
                                                Actions
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr
                                            class="border-b"
                                            v-for="sport in sports"
                                            :key="sport.id"
                                        >
                                            <td
                                                class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900"
                                            >
                                                {{ sport.id }}
                                            </td>
                                            <td
                                                class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap"
                                            >
                                                <input
                                                    class="border-none"
                                                    type="text"
                                                    :value="sport.sport"
                                                />
                                            </td>
                                            <td
                                                class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap"
                                            >
                                                <Link
                                                    :href="`/admin-panel/sport/${sport.id}`"
                                                    method="put"
                                                    as="button"
                                                >
                                                    Edit
                                                </Link>
                                            </td>
                                            <td
                                                class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap"
                                            >
                                                <Link
                                                    :href="`/admin-panel/sport/${sport.id}`"
                                                    method="delete"
                                                    as="button"
                                                >
                                                    Delete
                                                </Link>
                                                <!-- <button
                                                    @click="destroy(sport.id)"
                                                >
                                                    Delete
                                                </button> -->
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- </div> -->
    </div>
</template>
