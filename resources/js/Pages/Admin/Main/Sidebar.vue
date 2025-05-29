<script setup>
import { Link } from '@inertiajs/vue3'
import ApplicationLogo from '@/Components/ApplicationLogo.vue'
import NavLink from '@/Components/NavLink.vue'
import OrdersIcon from '@sprite/assets/icons/orders-icon.svg'
import DashboardIcon from '@sprite/assets/icons/dashboard-icon.svg'
import ProductsIcon from '@sprite/assets/icons/products-icon.svg'
</script>

<template>
    <aside class="admin-layout__sidebar">
        <Link href="/" class="admin-layout__logo">
            <ApplicationLogo />
        </Link>
        <div class="admin-layout__nav">
            <NavLink class="admin-layout__nav__link" :href="'category'" :active="'active'">
                <DashboardIcon class="icon" />
                Главная
            </NavLink>
            <NavLink class="admin-layout__nav__link" :href="'category'">
                <OrdersIcon class="icon" />
                Все продукты
            </NavLink>
            <NavLink class="admin-layout__nav__link" :href="'category'">
                <ProductsIcon class="icon" />
                Список заказов
            </NavLink>
        </div>
    </aside>
</template>
