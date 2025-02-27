<template>
    <header class="bg-blue-600 text-white p-4">
        <nav class="flex justify-between">
            <h1 class="text-xl"><router-link to="/">My Website</router-link></h1>
        </nav>
        <button @click="openClaimModal" class="bg-blue-500 text-white px-4 py-2 rounded-md">Claim Now</button>
    </header>
    <ClaimNowModal ref="claimModal" />
</template>

<script setup>
import { ref } from 'vue';
import ClaimNowModal from '@/components/ClaimNowModal.vue';

const claimModal = ref(null);

const openClaimModal = () => {
  claimModal.value.openModal();
};
</script>