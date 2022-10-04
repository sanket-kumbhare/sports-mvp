<script setup>
import InputLabel from "@/Components/InputLabel.vue";
import InputField from "@/Components/InputField.vue";
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";

const form = useForm({
    email: "",
    password: "",
});

const submit = () => {
    form.post("/login", {
        onFinish: () => form.reset("password"),
    });
};
</script>

<template>
    <div class="flex items-center justify-center h-screen">
        <div class="block p-6 rounded-lg shadow-lg bg-white max-w-md">
            <form @submit.prevent="submit">
                <div class="form-group mb-6">
                    <InputLabel label="Email" inputid="email" />
                    <InputField
                        type="email"
                        placeholder="Enter email"
                        id="email"
                        v-model="form.email"
                    />
                </div>
                <div class="form-group mb-6">
                    <InputLabel label="Password" inputid="pass" />
                    <InputField
                        type="password"
                        placeholder="Enter password"
                        id="pass"
                        v-model="form.password"
                    />
                </div>
                <div class="flex justify-between space-x-16 items-center mb-6">
                    <div class="form-group form-check">
                        <input
                            type="checkbox"
                            class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer"
                            id="exampleCheck2"
                        />
                        <label
                            class="form-check-label inline-block text-gray-800"
                            for="exampleCheck2"
                            >Remember me</label
                        >
                    </div>
                    <a
                        href="#!"
                        class="text-blue-600 hover:text-blue-700 focus:text-blue-700 transition duration-200 ease-in-out"
                        >Forgot password?</a
                    >
                </div>
                <button
                    type="submit"
                    class="w-full px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out"
                >
                    Sign in
                </button>
                <p class="text-gray-800 mt-6 text-center">
                    Not a member?
                    <Link
                        href="/register"
                        class="text-blue-600 hover:text-blue-700 focus:text-blue-700 transition duration-200 ease-in-out"
                        >Register</Link
                    >
                </p>
            </form>
        </div>
    </div>
</template>
