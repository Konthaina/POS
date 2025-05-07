<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import { Head } from '@inertiajs/vue3';
import { ref } from 'vue';

const breadcrumbs: BreadcrumbItem[] = [
  {
    title: 'Order Management',
    href: '/ordermanagement',
  },
];

defineProps<{
  name?: string;
}>();

const orders = ref([
  { id: 576, number: '228-3844-931-7689', time: '02:26 PM', status: 'On Cook', freeShipping: false, amount: '$250' },
  { id: 577, number: '123-4567-890-1234', time: '10:27 PM', status: 'Cancelled', freeShipping: true, amount: '$687' },
  { id: 578, number: '234-5678-901-2345', time: '04:00 AM', status: 'New Order', freeShipping: true, amount: '$891' },
  { id: 579, number: '958-4030-182-0187', time: '12:33 PM', status: 'On Cook', freeShipping: false, amount: '$165' },
  { id: 580, number: '345-6789-012-3456', time: '02:02 AM', status: 'On Cook', freeShipping: false, amount: '$165' },
  { id: 581, number: '456-7890-123-4567', time: '09:41 AM', status: 'Cancelled', freeShipping: true, amount: '$891' },
  { id: 582, number: '567-8901-234-5678', time: '12:50 PM', status: 'Cooked', freeShipping: true, amount: '$687' },
  { id: 583, number: '678-9012-345-6789', time: '04:26 PM', status: 'New Order', freeShipping: false, amount: '$250' },
  { id: 584, number: '789-0123-456-7890', time: '10:51 AM', status: 'Cooked', freeShipping: false, amount: '$512' },
  { id: 585, number: '901-2345-678-9012', time: '11:20 AM', status: 'New Order', freeShipping: false, amount: '$90' },
]);

const statusClasses = {
  'On Cook': 'bg-blue-100 text-blue-600',
  'Cancelled': 'bg-gray-100 text-gray-500',
  'New Order': 'bg-purple-100 text-purple-600',
  'Cooked': 'bg-green-100 text-green-600',
};
</script>

<template>
  <Head title="Order Management" />
  <AppLayout :breadcrumbs="breadcrumbs">
    <div class="p-4 space-y-6">
      <!-- Header -->
      <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
        <div>
          <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Order Management</h1>
          <p class="text-sm text-gray-500">Streamlining Your Sales Process.</p>
        </div>
        <div class="flex items-center gap-3">
          <input
            type="text"
            placeholder="Search order ID..."
            class="rounded-lg border border-gray-300 px-4 py-2 text-sm w-full md:w-64 focus:outline-none focus:ring focus:ring-indigo-200"
          />

          <a
            href="/pointofsale"
            class="inline-flex items-center gap-2 bg-indigo-600 text-white px-4 py-2 rounded-lg text-sm hover:bg-indigo-700 transition"
            >
            New Order
          </a>

        </div>
      </div>

      <!-- Orders Table -->
      <div class="bg-white dark:bg-gray-800 rounded-xl shadow overflow-x-auto border border-gray-200 dark:border-gray-700">
        <table class="min-w-full text-sm text-left">
          <thead class="bg-gray-50 dark:bg-gray-700 text-gray-600 dark:text-gray-300">
            <tr>
              <th class="px-6 py-3 font-medium">Order ID</th>
              <th class="px-6 py-3 font-medium">Order number</th>
              <th class="px-6 py-3 font-medium">Order date</th>
              <th class="px-6 py-3 font-medium">State</th>
              <th class="px-6 py-3 font-medium">Free shipping</th>
              <th class="px-6 py-3 font-medium">Amount</th>
              <th class="px-6 py-3 font-medium">Action</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="order in orders" :key="order.id" class="border-t border-gray-100 dark:border-gray-700">
              <td class="px-6 py-4 text-gray-900 dark:text-white">#{{ order.id }}</td>
              <td class="px-6 py-4 text-gray-700 dark:text-gray-300">{{ order.number }}</td>
              <td class="px-6 py-4 text-gray-700 dark:text-gray-300">{{ order.time }}</td>
              <td class="px-6 py-4">
                <span
                  class="text-xs px-2 py-1 rounded-full font-semibold"
                  :class="statusClasses[order.status]"
                >
                  {{ order.status }}
                </span>
              </td>
              <td class="px-6 py-4 text-center">
                <input type="checkbox" :checked="order.freeShipping" disabled />
              </td>
              <td class="px-6 py-4 font-medium text-gray-900 dark:text-white">{{ order.amount }}</td>
              <td class="px-6 py-4">
                <button class="text-gray-500 hover:text-gray-700 dark:hover:text-white">•••</button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </AppLayout>
</template>
