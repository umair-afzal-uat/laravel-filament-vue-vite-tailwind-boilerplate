<template>
    <div>
        <Header />
        <main class="p-8">
            <h2 class="text-2xl">Welcome to Our Website</h2>
            <p>Explore our content and learn more about us.</p>
            <button @click="openClaimModal" class="bg-blue-500 text-white px-4 py-2 rounded-md">Claim Now</button>
        </main>
        <Footer />
    </div>
    <ClaimNowModal ref="claimModal" />
</template>

<script setup>
import Header from '@/components/Header.vue';
import Footer from '@/components/Footer.vue';
import ClaimNowModal from '@/components/ClaimNowModal.vue';
import { ref } from "vue";

const claimModal = ref(null);

const openClaimModal = () => {
    claimModal.value.openModal();
};
</script>