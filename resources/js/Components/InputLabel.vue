<script setup>
defineProps({
    value: {
        type: String,
    },
})
</script>

<template>
    <label class="custom-label">
        <span v-if="value">{{ value }}</span>
        <span v-else><slot /></span>
    </label>
</template>
