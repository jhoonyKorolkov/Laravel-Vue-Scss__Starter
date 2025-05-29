<script setup>
import { Link } from '@inertiajs/vue3'

defineProps({
    href: {
        type: String,
        required: true,
    },
})
</script>

<template>
    <Link :href="href" class="dropdown-link">
        <slot />
    </Link>
</template>

<style scoped lang="scss">
.dropdown-link {
    display: block;
    width: 100%;
    padding: 0.5rem 1rem;
    text-align: left;
    font-size: 0.875rem; // text-sm
    line-height: 1.25rem; // leading-5
    color: #374151; // text-gray-700
    background-color: transparent;
    border: none;
    cursor: pointer;
    transition: background-color 0.15s ease-in-out;

    &:hover,
    &:focus {
        background-color: #f3f4f6; // bg-gray-100
        outline: none;
    }
}
</style>
