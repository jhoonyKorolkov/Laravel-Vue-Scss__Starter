<script setup>
import Header from '@/Pages/Admin/Main/Header.vue'
import Sidebar from '@/Pages/Admin/Main/Sidebar.vue'
</script>

<template>
    <main class="admin-layout">
        <Header />
        <Sidebar />
        <section class="admin-layout__content">
            <slot />
        </section>
    </main>
</template>
