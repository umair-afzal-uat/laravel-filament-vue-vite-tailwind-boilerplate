<template>
    <header class="bg-blue-600 text-white p-4">
        <nav class="flex justify-between">
            <h1 class="text-xl">My Website</h1>
            <ul class="flex space-x-4">
                <li><router-link to="/">Home</router-link></li>
                <li><router-link to="/about">About Us</router-link></li>
                <li><router-link to="/terms">Terms</router-link></li>
                <li><router-link to="/contact">Contact</router-link></li>
            </ul>
        </nav>
    </header>
</template>