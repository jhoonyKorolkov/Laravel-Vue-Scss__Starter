<script setup>
import ApplicationLogo from '@/Components/ApplicationLogo.vue'
import { Link } from '@inertiajs/vue3'
</script>

<template>
    <main class="admin-layout">
        <header class="admin-layout__header"></header>
        <aside class="admin-layout__sidebar">
            <Link href="/">
                <ApplicationLogo />
            </Link>
        </aside>
        <section class="admin-layout__content">
            <slot />
        </section>
    </main>
</template>

<style scoped></style>
