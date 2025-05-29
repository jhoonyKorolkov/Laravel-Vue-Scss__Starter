<script setup>
import { computed, onMounted, onUnmounted } from 'vue'

const props = defineProps({
    opened: Boolean,
    align: {
        type: String,
        default: 'right',
    },
    width: {
        type: String,
        default: '48',
    },
    contentClasses: {
        type: String,
        default: '',
    },
})

const emit = defineEmits(['update:opened'])

const closeOnEscape = (e) => {
    if (props.opened && e.key === 'Escape') {
        emit('update:opened', false)
    }
}

onMounted(() => document.addEventListener('keydown', closeOnEscape))
onUnmounted(() => document.removeEventListener('keydown', closeOnEscape))

const widthClass = computed(() => `dropdown--width-${props.width}`)

const alignmentClasses = computed(() => {
    switch (props.align) {
        case 'left':
            return 'dropdown--align-left'
        case 'right':
            return 'dropdown--align-right'
        default:
            return 'dropdown--align-center'
    }
})

const toggleDropdown = () => {
    emit('update:opened', !props.opened)
}
</script>

<template>
    <div class="dropdown">
        <div @click="toggleDropdown">
            <slot name="trigger" />
        </div>

        <div
            v-show="props.opened"
            class="dropdown__overlay"
            @click="emit('update:opened', false)"
        />

        <Transition
            enter-active-class="dropdown__transition--enter-active"
            enter-from-class="dropdown__transition--enter-from"
            enter-to-class="dropdown__transition--enter-to"
            leave-active-class="dropdown__transition--leave-active"
            leave-from-class="dropdown__transition--leave-from"
            leave-to-class="dropdown__transition--leave-to"
        >
            <div
                v-show="props.opened"
                class="dropdown__menu"
                :class="[widthClass, alignmentClasses]"
                style="display: none"
                @click="emit('update:opened', false)"
            >
                <div class="dropdown__content" :class="contentClasses">
                    <slot name="content" />
                </div>
            </div>
        </Transition>
    </div>
</template>

<style lang="scss" scoped>
.dropdown {
    position: relative;

    &__overlay {
        position: fixed;
        inset: 0;
        z-index: 40;
    }

    &__menu {
        position: absolute;
        z-index: 50;
        margin-top: 0.5rem;
        border-radius: 0.375rem;
        box-shadow:
            0 10px 15px -3px rgba(0, 0, 0, 0.1),
            0 4px 6px -2px rgba(0, 0, 0, 0.05);
    }

    &__content {
        border-radius: 0.375rem;
        border: 1px solid rgba(0, 0, 0, 0.1);
        background-color: white;
        padding: 0.5rem 0;
    }

    &--width-48 {
        width: 12rem; // 48 * 0.25rem
    }

    &--align-left {
        left: 0;
        transform-origin: top left;
    }

    &--align-right {
        right: 0;
        transform-origin: top right;
    }

    &--align-center {
        left: 50%;
        transform: translateX(-50%);
        transform-origin: top center;
    }

    &__transition--enter-active {
        transition: all 0.2s ease-out;
    }

    &__transition--enter-from {
        opacity: 0;
        transform: scale(0.95);
    }

    &__transition--enter-to {
        opacity: 1;
        transform: scale(1);
    }

    &__transition--leave-active {
        transition: all 0.075s ease-in;
    }

    &__transition--leave-from {
        opacity: 1;
        transform: scale(1);
    }

    &__transition--leave-to {
        opacity: 0;
        transform: scale(0.95);
    }
}
</style>
