<script setup>
defineProps({
    message: {
        type: String,
    },
})
</script>

<template>
    <div v-show="message">
        {{ message }}
    </div>
</template>
