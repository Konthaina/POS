<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import { Head } from '@inertiajs/vue3';
import { ref } from 'vue';

const breadcrumbs: BreadcrumbItem[] = [
  {
    title: 'User Management',
    href: '/usermanagement',
  },
];

defineProps<{
  name?: string;
}>();

const users = ref([
  {
    name: 'Elizabeth Lopez',
    username: 'elizabethlopez',
    password: 'admin123',
    email: 'elopez@yahoo.com',
    roles: ['Admin'],
    checked: true,
  },
  {
    name: 'Elizabeth Hall',
    username: 'elizabeth_hall_1998',
    password: 'hallpass98',
    email: 'elizabeth_hall_1998@gmail.com',
    roles: ['Owner', 'Cashier'],
    checked: true,
  },
  {
    name: 'Matthew Martinez',
    username: 'mmartinez1997',
    password: 'mmpass97',
    email: 'mmartinez1997@gmail.com',
    roles: ['Owner'],
    checked: true,
  },
  {
    name: 'Maria White',
    username: 'maria_white',
    password: 'maria@2023',
    email: 'maria_white@hotmail.com',
    roles: ['Admin'],
    checked: false,
  },
  {
    name: 'Elizabeth Watson',
    username: 'ewatson',
    password: 'watson321',
    email: 'ewatson@yahoo.com',
    roles: ['Admin'],
    checked: false,
  },
  {
    name: 'Elizabeth Allen',
    username: 'eallen1998',
    password: 'eallenpass',
    email: 'eallen@gmail.com',
    roles: ['Admin'],
    checked: false,
  },
  {
    name: 'Caleb Jones',
    username: 'calebjones',
    password: 'calebpass',
    email: 'calebjones@gmail.com',
    roles: ['Cashier'],
    checked: false,
  },
  {
    name: 'Elizabeth Taylor',
    username: 'elizabeth_taylor',
    password: 'tayl0r!',
    email: 'taylor.elizabeth@yahoo.com',
    roles: ['Cashier'],
    checked: false,
  },
  {
    name: 'Jennifer King',
    username: 'jking93',
    password: 'jkingpass',
    email: 'jking93@yahoo.com',
    roles: ['Cashier'],
    checked: false,
  },
  {
    name: 'Daniel Moore',
    username: 'danielmoore',
    password: 'moore123',
    email: 'danielmoore@yahoo.com',
    roles: ['Cashier'],
    checked: false,
  },
]);


const roleClasses = {
  Admin: 'bg-gray-100 text-gray-700',
  Owner: 'bg-pink-100 text-pink-600',
  Cashier: 'bg-indigo-100 text-indigo-600',
};
</script>

<template>
  <Head title="User Management" />
  <AppLayout :breadcrumbs="breadcrumbs">
    <div class="p-4 space-y-6">
      <!-- Header -->
      <div>
        <h1 class="text-2xl font-bold text-gray-900 dark:text-white">User Management</h1>
        <p class="text-sm text-gray-500">Streamlining Your Sales Process.</p>
      </div>

      <!-- Table -->
      <div class="bg-white dark:bg-gray-800 rounded-xl shadow overflow-x-auto border border-gray-200 dark:border-gray-700">
        <table class="min-w-full text-sm text-left">
          <thead class="bg-gray-50 dark:bg-gray-700 text-gray-600 dark:text-gray-300">
            <tr>
              <th class="px-4 py-3">
                <input type="checkbox" />
              </th>
              <th class="px-4 py-3 font-medium">Name</th>
              <th class="px-4 py-3 font-medium">User Name</th>
              <th class="px-4 py-3 font-medium">Password</th>
              <th class="px-4 py-3 font-medium">Email</th>
              <th class="px-4 py-3 font-medium">Role</th>
              <th class="px-4 py-3 font-medium">Action</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="(user, index) in users" :key="index" class="border-t border-gray-100 dark:border-gray-700">
              <td class="px-4 py-3">
                <input type="checkbox" :checked="user.checked" />
              </td>
              <td class="px-4 py-3 font-semibold text-gray-900 dark:text-white">{{ user.name }}</td>
              <td class="px-4 py-3 text-gray-700 dark:text-gray-300">{{ user.username }}</td>
              <td class="px-4 py-3 text-gray-700 dark:text-gray-300">{{ user.password }}</td>
              <td class="px-4 py-3 text-gray-700 dark:text-gray-300">{{ user.email }}</td>
              <td class="px-4 py-3 flex flex-wrap gap-1">
                <span
                  v-for="role in user.roles"
                  :key="role"
                  class="text-xs px-2 py-1 rounded-full font-semibold"
                  :class="roleClasses[role]"
                >
                  {{ role }}
                </span>
              </td>
              <td class="px-4 py-3">
                <a href="#" class="text-indigo-600 hover:underline text-sm">Edit</a>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </AppLayout>
</template>
