<script setup>
import ApplicationLogo from '@/Components/ApplicationLogo.vue'
import { Link } from '@inertiajs/vue3'
</script>

<template>
    <div class="auth-layout">
        <div class="auth-layout__info">
            <Link href="/" class="auth-layout__logo">
                <ApplicationLogo />
            </Link>
        </div>
        <div class="auth-layout__content">
            <slot />
        </div>
    </div>
</template>
