<script setup>
import { onMounted, ref } from 'vue'

const model = defineModel({
    type: String,
    required: true,
})

const props = defineProps({
    placeholder: String,
})

const input = ref(null)

onMounted(() => {
    if (input.value.hasAttribute('autofocus')) {
        input.value.focus()
    }
})

defineExpose({ focus: () => input.value.focus() })
</script>

<template>
    <input class="custom-input" v-model="model" ref="input" :placeholder="placeholder" />
</template>
