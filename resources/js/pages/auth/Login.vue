<script setup lang="ts">
import InputError from '@/components/InputError.vue';
import TextLink from '@/components/TextLink.vue';
import { Button } from '@/components/ui/button';
import { Checkbox } from '@/components/ui/checkbox';
import { Input } from '@/components/ui/input';
import { Label } from '@/components/ui/label';
import { Head, useForm } from '@inertiajs/vue3';
import { LoaderCircle } from 'lucide-vue-next';

defineProps<{
  status?: string;
  canResetPassword: boolean;
}>();

const form = useForm({
  email: '',
  password: '',
  remember: false,
});

const submit = () => {
  form.post(route('login'), {
    onFinish: () => form.reset('password'),
  });
};
</script>

<template>
  <Head title="Login" />

  <div class="flex min-h-screen bg-white dark:bg-gray-900">
    <!-- Left: Image -->
    <div class="w-1/2 hidden lg:block">
      <img
        src="Container.png"
        alt="Login Background"
        class="h-screen w-full object-cover object-center"
      />
    </div>

    <!-- Right: Login Form -->
    <div class="w-full lg:w-1/2 flex flex-col justify-center px-8 py-12 bg-white dark:bg-gray-900">
      <div class="max-w-md w-full mx-auto">
        <div class="flex justify-center mb-6">
          <img src="/logoeden.png" alt="Eden Logo" class="h-24 w-24 rounded-full object-cover" />
        </div>

        <h2 class="text-2xl font-semibold mb-2 text-center text-gray-900 dark:text-white">
          Welcome to Eden
        </h2>
        <p class="text-sm text-gray-500 dark:text-gray-400 text-center mb-6">
          Log in to your account
        </p>

        <div v-if="status" class="mb-4 text-center text-sm font-medium text-green-600">
          {{ status }}
        </div>

        <form @submit.prevent="submit" class="flex flex-col gap-6">
          <div class="grid gap-4">
            <div class="grid gap-2.5">
              <Label for="email" class="text-gray-700 dark:text-gray-200">Email address</Label>
              <Input
                id="email"
                type="email"
                required
                autofocus
                autocomplete="email"
                v-model="form.email"
                placeholder="email@example.com"
              />
              <InputError :message="form.errors.email" />
            </div>

            <div class="grid gap-1.5">
              <div class="flex items-center justify-between">
                <Label for="password" class="text-gray-700 dark:text-gray-200">Password</Label>
                <TextLink
                  v-if="canResetPassword"
                  :href="route('password.request')"
                  class="text-sm text-indigo-600 hover:underline dark:text-indigo-400"
                >
                  Forgot password?
                </TextLink>
              </div>
              <Input
                id="password"
                type="password"
                required
                autocomplete="current-password"
                v-model="form.password"
                placeholder="Password"
              />
              <InputError :message="form.errors.password" />
            </div>

            <div class="flex items-center space-x-2">
              <Checkbox id="remember" v-model:checked="form.remember" />
              <Label for="remember" class="text-gray-700 dark:text-gray-200">Remember me</Label>
            </div>

            <Button type="submit" class="w-full" :disabled="form.processing">
              <LoaderCircle v-if="form.processing" class="h-4 w-4 animate-spin mr-2" />
              Log in
            </Button>
          </div>

          <p class="text-center text-sm text-gray-500 dark:text-gray-400 mt-2">
            Don’t have an account?
            <TextLink :href="route('register')" class="text-indigo-600 dark:text-indigo-400">Sign up</TextLink>
          </p>
        </form>
      </div>
    </div>
  </div>
</template>
