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
            </form>
        </main>
        <Footer />
    </div>
</template>

<script setup>
import { ref } from 'vue';
import { useVuelidate } from '@vuelidate/core';
import { required, email as emailValidator } from '@vuelidate/validators';
import Header from '@/components/Header.vue';
import Footer from '@/components/Footer.vue';

const name = ref('');
const userEmail = ref(''); 
const message = ref('');

const rules = {
    name: { required },
    userEmail: { required, email: emailValidator }, 
    message: { required },
};

const v$ = useVuelidate(rules, { name, userEmail, message });

const submitForm = () => {
    v$.value.$validate();
    if (!v$.value.$error) {
        alert('Form submitted successfully!');
    }
};
</script>
