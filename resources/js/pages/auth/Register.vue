<script setup lang="ts">
import InputError from '@/components/InputError.vue';
import TextLink from '@/components/TextLink.vue';
import { Button } from '@/components/ui/button';
import { Input } from '@/components/ui/input';
import { Label } from '@/components/ui/label';
import { Head, useForm } from '@inertiajs/vue3';
import { LoaderCircle } from 'lucide-vue-next';

const form = useForm({
  name: '',
  email: '',
  password: '',
  password_confirmation: '',
});

const submit = () => {
  form.post(route('register'), {
    onFinish: () => form.reset('password', 'password_confirmation'),
  });
};
</script>

<template>
  <Head title="Register" />

  <div class="flex min-h-screen bg-white dark:bg-gray-900">
    <!-- Left: Image -->
    <div class="w-1/2 hidden lg:block">
      <img
        src="Container.png"
        alt="Register Background"
        class="h-screen w-full object-cover object-center"
      />
    </div>

    <!-- Right: Register Form -->
    <div class="w-full lg:w-1/2 flex flex-col justify-center px-8 py-12 bg-white dark:bg-gray-900">
      <div class="max-w-md w-full mx-auto">
        <!-- Logo -->
        <div class="flex justify-center mb-6">
          <img src="/logoeden.png" alt="Eden Logo" class="h-24 w-24 rounded-full object-cover" />
        </div>

        <!-- Headings -->
        <h2 class="text-2xl font-semibold mb-2 text-center text-gray-900 dark:text-white">
          Create an account
        </h2>
        <p class="text-sm text-gray-500 dark:text-gray-400 text-center mb-6">
          Enter your details below to create your account
        </p>

        <!-- Form -->
        <form @submit.prevent="submit" class="flex flex-col gap-6">
          <div class="grid gap-4">
            <!-- Name -->
            <div class="grid gap-2">
              <Label for="name" class="text-gray-700 dark:text-gray-200">Name</Label>
              <Input
                id="name"
                type="text"
                required
                autofocus
                tabindex="1"
                autocomplete="name"
                v-model="form.name"
                placeholder="Full name"
              />
              <InputError :message="form.errors.name" />
            </div>

            <!-- Email -->
            <div class="grid gap-2">
              <Label for="email" class="text-gray-700 dark:text-gray-200">Email address</Label>
              <Input
                id="email"
                type="email"
                required
                tabindex="2"
                autocomplete="email"
                v-model="form.email"
                placeholder="email@example.com"
              />
              <InputError :message="form.errors.email" />
            </div>

            <!-- Password -->
            <div class="grid gap-2">
              <Label for="password" class="text-gray-700 dark:text-gray-200">Password</Label>
              <Input
                id="password"
                type="password"
                required
                tabindex="3"
                autocomplete="new-password"
                v-model="form.password"
                placeholder="Password"
              />
              <InputError :message="form.errors.password" />
            </div>

            <!-- Confirm Password -->
            <div class="grid gap-2">
              <Label for="password_confirmation" class="text-gray-700 dark:text-gray-200">Confirm password</Label>
              <Input
                id="password_confirmation"
                type="password"
                required
                tabindex="4"
                autocomplete="new-password"
                v-model="form.password_confirmation"
                placeholder="Confirm password"
              />
              <InputError :message="form.errors.password_confirmation" />
            </div>

            <!-- Submit -->
            <Button type="submit" class="mt-2 w-full" tabindex="5" :disabled="form.processing">
              <LoaderCircle v-if="form.processing" class="h-4 w-4 animate-spin mr-2" />
              Create account
            </Button>
          </div>

          <!-- Footer -->
          <p class="text-center text-sm text-gray-500 dark:text-gray-400 mt-2">
            Already have an account?
            <TextLink :href="route('login')" class="text-indigo-600 dark:text-indigo-400">Log in</TextLink>
          </p>
        </form>
      </div>
    </div>
  </div>
</template>
