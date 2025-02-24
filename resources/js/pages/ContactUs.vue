<template>
    <div>
        <Header />
        <main class="p-8">
            <h2 class="text-2xl mb-4">Contact Us</h2>
            <form @submit.prevent="submitForm" class="space-y-4">
                <div>
                    <label>Name:</label>
                    <input v-model="name" class="border p-2 w-full" />
                    <p v-if="v$.name.$error" class="text-red-500">Name is required</p>
                </div>

                <div>
                    <label>Email:</label>
                    <input v-model="userEmail" class="border p-2 w-full" />
                    <p v-if="v$.userEmail.$error" class="text-red-500">Valid email is required</p>
                </div>

                <div>
                    <label>Message:</label>
                    <textarea v-model="message" class="border p-2 w-full"></textarea>
                    <p v-if="v$.message.$error" class="text-red-500">Message is required</p>
                </div>

                <button type="submit" class="bg-blue-500 text-white px-4 py-2">Send</button>
                <p v-if="successMessage" class="text-green-600 mt-2">{{ successMessage }}</p>
            </form>
        </main>
        <Footer />
    </div>
</template>

<script setup>
import { ref, onMounted } from 'vue';
import axios from 'axios';
import { useVuelidate } from '@vuelidate/core';
import { required, email as emailValidator } from '@vuelidate/validators';
import Header from '@/components/Header.vue';
import Footer from '@/components/Footer.vue';

// Load API URL from .env
const API_BASE_URL = import.meta.env.VITE_API_BASE_URL;

const name = ref('');
const userEmail = ref('');
const message = ref('');
const csrfToken = ref('');
const successMessage = ref('');

// Validation rules
const rules = {
    name: { required },
    userEmail: { required, email: emailValidator },
    message: { required },
};
const v$ = useVuelidate(rules, { name, userEmail, message });

// Fetch CSRF Token
onMounted(async () => {
    try {
        const response = await axios.get(`${API_BASE_URL}/csrf-token`, { withCredentials: true });
        csrfToken.value = response.data.csrf_token;
    } catch (error) {
        console.error('Error fetching CSRF token:', error);
    }
});

// Submit Contact Form
const submitForm = async () => {
    v$.value.$validate();
    if (!v$.value.$error) {
        try {
            await axios.post(
                `${API_BASE_URL}/contact`,
                {
                    name: name.value,
                    email: userEmail.value,
                    message: message.value,
                },
                {
                    headers: { 'X-CSRF-TOKEN': csrfToken.value },
                    withCredentials: true, // Ensures cookies are sent
                }
            );
            successMessage.value = 'Your message has been sent!';
            name.value = '';
            userEmail.value = '';
            message.value = '';
            v$.value.$reset();
        } catch (error) {
            console.error('Error submitting form:', error);
        }
    }
};
</script>
