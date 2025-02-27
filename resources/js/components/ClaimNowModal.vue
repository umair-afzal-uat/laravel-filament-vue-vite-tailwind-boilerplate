<template>
    <div v-if="isOpen" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50">
        <div class="bg-white p-6 rounded-lg shadow-lg w-96">
            <h2 class="text-xl font-bold mb-4">Claim Now</h2>
            <form ref="claimForm" @submit.prevent="submitClaimForm">
                <div class="mb-2">
                    <label class="block text-sm font-medium">Title</label>
                    <select v-model="form.title" class="w-full p-2 border rounded">
                        <option value="" disabled>Select Title</option>
                        <option value="Mr">Mr</option>
                        <option value="Mrs">Mrs</option>
                        <option value="Miss">Miss</option>
                        <option value="Dr">Dr</option>
                        <option value="Prof">Prof</option>
                        <option value="Lady">Lady</option>
                    </select>
                    <p v-if="v$claim.title.$error" class="text-red-500">Title is required</p>
                </div>

                <div class="mb-2">
                    <label class="block text-sm font-medium">First Name</label>
                    <input v-model="form.first_name" type="text" class="w-full p-2 border rounded" />
                    <p v-if="v$claim.first_name.$error" class="text-red-500">First Name is required</p>
                </div>

                <div class="mb-2">
                    <label class="block text-sm font-medium">Last Name</label>
                    <input v-model="form.last_name" type="text" class="w-full p-2 border rounded" />
                    <p v-if="v$claim.last_name.$error" class="text-red-500">Last Name is required</p>
                </div>

                <div class="mb-2">
                    <label class="block text-sm font-medium">Address</label>
                    <input v-model="form.address" type="text" class="w-full p-2 border rounded" />
                    <p v-if="v$claim.address.$error" class="text-red-500">Address is required</p>
                </div>

                <div class="mb-2">
                    <label class="block text-sm font-medium">Mobile</label>
                    <input v-model="form.mobile" type="tel" class="w-full p-2 border rounded" />
                    <p v-if="v$claim.mobile.$error" class="text-red-500">Enter a valid phone number (10-15 digits)</p>
                </div>

                <div class="mb-2">
                    <label class="block text-sm font-medium">Email</label>
                    <input v-model="form.email" type="email" class="w-full p-2 border rounded" />
                    <p v-if="v$claim.email.$error" class="text-red-500">Valid email is required</p>
                </div>

                <!-- Hidden Fields -->
                <input type="hidden" v-model="form.postcode" />
                <input type="hidden" v-model="form.address1" />
                <input type="hidden" v-model="form.address2" />
                <input type="hidden" v-model="form.address3" />
                <input type="hidden" v-model="form.city" />
                <input type="hidden" v-model="form.county" />
                <input type="hidden" v-model="form.countrylist" />

                <div class="mt-4 flex justify-between">
                    <button type="button" @click="closeModal"
                        class="px-4 py-2 bg-gray-400 text-white rounded">Cancel</button>
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded">Submit</button>
                </div>
            </form>
        </div>
    </div>
</template>

<script setup>
import { ref, onMounted } from 'vue';
import axios from 'axios';
import { useVuelidate } from '@vuelidate/core';
import { required, email as emailValidator, minLength, maxLength, numeric } from '@vuelidate/validators';
import { useToast } from 'vue-toastification';

const toast = useToast();

const API_BASE_URL = import.meta.env.VITE_API_BASE_URL;

const isOpen = ref(false);
const csrfToken = ref('');

const form = ref({
    title: '',
    first_name: '',
    last_name: '',
    address: '',
    mobile: '',
    email: '',
    postcode: '',
    address1: '',
    address2: '',
    address3: '',
    city: '',
    county: '',
    countrylist: '',
});

const claimRules = {
    title: { required },
    first_name: { required },
    last_name: { required },
    address: { required },
    mobile: { required, numeric, minLength: minLength(10), maxLength: maxLength(15) },
    email: { required, email: emailValidator },
};

const v$claim = useVuelidate(claimRules, form, { $stopPropagation: true }); 

onMounted(async () => {
    try {
        const response = await axios.get(`${API_BASE_URL}/csrf-token`, { withCredentials: true });
        csrfToken.value = response.data.csrfToken;
    } catch (error) {
        console.error('Error fetching CSRF token:', error);
    }
});

const openModal = () => {
    isOpen.value = true;
};

const closeModal = () => {
    isOpen.value = false;
    v$claim.value.$reset(); 
};

const submitClaimForm = async () => {
    v$claim.value.$validate();
    if (!v$claim.value.$error) {
        try {
            await axios.post(
                `${API_BASE_URL}/api/leads`,
                form.value,
                {
                    headers: { 'X-CSRF-TOKEN': csrfToken.value },
                    withCredentials: true,
                }
            );
            toast.success('Your claim has been submitted!');
            form.value = {
                title: '', first_name: '', last_name: '', address: '', mobile: '', email: '',
                postcode: '', address1: '', address2: '', address3: '', city: '', county: '', countrylist: ''
            };
            closeModal(); 
        } catch (error) {
            console.error('Error submitting claim:', error);
        }
    }
};

defineExpose({ openModal });
</script>
