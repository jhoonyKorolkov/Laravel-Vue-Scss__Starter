<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue'
import InputError from '@/Components/InputError.vue'
import PrimaryButton from '@/Components/PrimaryButton.vue'
import TextInput from '@/Components/TextInput.vue'
import { Head, useForm } from '@inertiajs/vue3'

defineProps({
    canResetPassword: {
        type: Boolean,
    },
    status: {
        type: String,
    },
})

const form = useForm({
    email: '',
    password: '',
    remember: false,
})

const submit = () => {
    form.post(route('login'), {
        onFinish: () => form.reset('password'),
    })
}
</script>

<template>
    <GuestLayout>
        <Head title="Log in" />
        <!--        <Link v-if="canResetPassword" :href="route('password.request')" class="auth-layout__forgot">-->
        <!--            Forgot your password?-->
        <!--        </Link>-->

        <div v-if="status">
            {{ status }}
        </div>

        <form class="auth-form" @submit.prevent="submit">
            <div class="custom-field" :class="{ error: form.errors.email }">
                <TextInput
                    id="email"
                    type="email"
                    v-model="form.email"
                    :placeholder="'Email'"
                    @focus="form.errors.email = ''"
                    required
                    autofocus
                    autocomplete="username"
                />

                <InputError class="custom-field__error" :message="form.errors.email" />
            </div>

            <div class="custom-field" :class="{ error: form.errors.password }">
                <TextInput
                    id="password"
                    type="password"
                    v-model="form.password"
                    :placeholder="'Password'"
                    @focus="form.errors.password = ''"
                    required
                    autocomplete="current-password"
                />

                <InputError class="custom-field__error" :message="form.errors.password" />
            </div>

            <!--            <label class="auth-form__agree">-->
            <!--                <Checkbox name="remember" v-model:checked="form.remember" />-->
            <!--                <span>Remember me</span>-->
            <!--            </label>-->

            <div class="mt-4 flex items-center justify-end">
                <PrimaryButton
                    class="ms-4"
                    :class="{ 'opacity-25': form.processing }"
                    :disabled="form.processing"
                >
                    Войти
                </PrimaryButton>
            </div>
        </form>
    </GuestLayout>
</template>
