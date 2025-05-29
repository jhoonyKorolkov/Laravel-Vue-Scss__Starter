<script setup>
import { usePage } from '@inertiajs/vue3'
import { computed, onMounted, ref } from 'vue'
import ChevronDownIcon from '@sprite/assets/icons/chevron_down-icon.svg'
import Dropdown from '@/Components/Dropdown.vue'
import DropdownLink from '@/Components/DropdownLink.vue'

const page = usePage()
const open = ref(false)

const user = computed(() => page.props.auth?.user)

// noinspection JSUnresolvedReference
const userRole = computed(() => user.value?.roles?.find((role) => role.title).title)
const themeIcon = computed(() => (isDark.value ? '🌙' : '🌞'))

const isDark = ref(false)

const toggleTheme = () => {
    isDark.value = !isDark.value
    const html = document.documentElement
    html.classList.toggle('dark', isDark.value)
    localStorage.setItem('theme', isDark.value ? 'dark' : 'light')
}

onMounted(() => {
    const saved = localStorage.getItem('theme')
    if (saved === 'dark') {
        isDark.value = true
        document.documentElement.classList.add('dark')
    }
})
</script>
<template>
    <header class="admin-layout__header" v-if="userRole">
        <Dropdown align="right" width="48" v-model:opened="open">
            <template #trigger>
                <button class="admin-layout__header-drop-button" :class="{ active: open }">
                    {{ userRole }}
                    <ChevronDownIcon class="icon" />
                </button>
            </template>

            <template #content>
                <DropdownLink href="/profile">Профиль</DropdownLink>
                <DropdownLink href="/settings">Настройки</DropdownLink>
                <DropdownLink href="/logout">Выйти</DropdownLink>
            </template>
        </Dropdown>
        <button @click="toggleTheme" class="admin-layout__theme-toggle">
            {{ themeIcon }}
        </button>
    </header>
</template>
