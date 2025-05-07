<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import { Head } from '@inertiajs/vue3';
import { ref } from 'vue';

const breadcrumbs: BreadcrumbItem[] = [
  {
    title: 'Item Management',
    href: '/itemmanagement',
  },
];

defineProps<{
  name?: string;
}>();

const items = ref([
  {
    name: 'Spicy Jalapeño Burger',
    image: '/Logoeden.png',
    category: 'Fastfood',
    quantity: '15 Units',
    vendor: 'S.laz Store',
    status: 'Active',
    checked: true
  },
  {
    name: 'Mediterranean Lamb Burger',
    image: '/Logoeden.png',
    category: 'Fastfood',
    quantity: '8 Units',
    vendor: 'S.laz Store',
    status: 'Active',
    checked: true
  },
  {
    name: 'Spicy Jalapeño Burger',
    image: '/Logoeden.png',
    category: 'Fastfood',
    quantity: '25 Units',
    vendor: 'S.laz Store',
    status: 'Active',
    checked: true
  },
  {
    name: 'Bacon Avocado Burger',
    image: '/Logoeden.png',
    category: 'Fastfood',
    quantity: '5 Units',
    vendor: 'S.laz Store',
    status: 'Draft',
    checked: true
  },
  {
    name: 'Mushroom Swiss Burger',
    image: '/Logoeden.png',
    category: 'Fastfood',
    quantity: '2 Units',
    vendor: 'S.laz Store',
    status: 'Active',
    checked: false
  },
  {
    name: 'BBQ Pulled Pork Burger',
    image: '/Logoeden.png',
    category: 'Fastfood',
    quantity: '5 Units',
    vendor: 'S.laz Store',
    status: 'Inactive',
    checked: false
  },
  {
    name: 'Classic Cheeseburger',
    image: '/Logoeden.png',
    category: 'Fastfood',
    quantity: '10 Units',
    vendor: 'S.laz Store',
    status: 'Inactive',
    checked: false
  },
]);

const statusClasses = {
  Active: 'bg-pink-100 text-pink-600',
  Draft: 'bg-blue-100 text-blue-600',
  Inactive: 'bg-gray-100 text-gray-500',
};
</script>

<template>
  <Head title="Item Management" />
  <AppLayout :breadcrumbs="breadcrumbs">
    <div class="p-4 space-y-6">
      <!-- Header -->
      <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
        <div>
          <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Item Management</h1>
          <p class="text-sm text-gray-500">Streamlining Your Sales Process.</p>
        </div>
        <div class="flex items-center gap-3">
          <input
            type="text"
            placeholder="Search item name..."
            class="rounded-lg border border-gray-300 px-4 py-2 text-sm w-full md:w-64 focus:outline-none focus:ring focus:ring-indigo-200"
          />
          <button class="bg-indigo-600 text-white px-4 py-2 rounded-lg text-sm hover:bg-indigo-700">New Item</button>
        </div>
      </div>

      <!-- Tabs -->
      <div class="flex gap-6 border-b border-gray-200 dark:border-gray-700 text-sm font-semibold">
        <button class="border-b-2 border-indigo-600 text-indigo-600 pb-2">All Product (50)</button>
        <button class="text-gray-500 pb-2 hover:text-indigo-600">Active (30)</button>
        <button class="text-gray-500 pb-2 hover:text-indigo-600">Draft (10)</button>
        <button class="text-gray-500 pb-2 hover:text-indigo-600">Inactive (10)</button>
      </div>

      <!-- Table -->
      <div class="bg-white dark:bg-gray-800 rounded-xl shadow overflow-x-auto border border-gray-200 dark:border-gray-700">
        <table class="min-w-full text-sm text-left">
          <thead class="bg-gray-50 dark:bg-gray-700 text-gray-600 dark:text-gray-300">
            <tr>
              <th class="px-4 py-3"><input type="checkbox" checked /></th>
              <th class="px-4 py-3 font-medium">Product</th>
              <th class="px-4 py-3 font-medium">Name</th>
              <th class="px-4 py-3 font-medium">Category</th>
              <th class="px-4 py-3 font-medium">Quantity</th>
              <th class="px-4 py-3 font-medium">Vendor</th>
              <th class="px-4 py-3 font-medium">Status</th>
              <th class="px-4 py-3 font-medium">Action</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="(item, index) in items" :key="index" class="border-t border-gray-100 dark:border-gray-700">
              <td class="px-4 py-3">
                <input type="checkbox" :checked="item.checked" />
              </td>
              <td class="px-4 py-3">
                <img :src="item.image" alt="product" class="h-12 w-12 rounded-lg object-cover" />
              </td>
              <td class="px-4 py-3 font-medium text-gray-900 dark:text-white">{{ item.name }}</td>
              <td class="px-4 py-3">
                <span class="text-xs px-2 py-1 rounded-full font-semibold bg-purple-100 text-purple-600">
                  {{ item.category }}
                </span>
              </td>
              <td class="px-4 py-3 text-gray-700 dark:text-gray-300">{{ item.quantity }}</td>
              <td class="px-4 py-3 text-gray-700 dark:text-gray-300">{{ item.vendor }}</td>
              <td class="px-4 py-3">
                <span
                  class="text-xs px-2 py-1 rounded-full font-semibold"
                  :class="statusClasses[item.status]"
                >
                  {{ item.status }}
                </span>
              </td>
              <td class="px-4 py-3">
                <button class="text-gray-500 hover:text-gray-700 dark:hover:text-white">•••</button>
              </td>
            </tr>
          </tbody>
        </table>

        <!-- Pagination -->
        <div class="flex items-center justify-end px-6 py-4 border-t border-gray-100 dark:border-gray-700">
          <nav class="inline-flex items-center space-x-1 text-sm">
            <button class="px-3 py-1 bg-indigo-600 text-white rounded">1</button>
            <button class="px-3 py-1 text-gray-500 hover:text-indigo-600">2</button>
            <span class="px-3 py-1 text-gray-400">...</span>
            <button class="px-3 py-1 text-gray-500 hover:text-indigo-600">10</button>
          </nav>
        </div>
      </div>
    </div>
  </AppLayout>
</template>
