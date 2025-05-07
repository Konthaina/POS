<template>
    <Head title="Inventory" />

    <AppLayout :breadcrumbs="breadcrumbs">
      <div class="p-4 space-y-6">
        <!-- Header -->
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
          <div>
            <h2 class="text-2xl font-bold text-gray-900 dark:text-white">Inventory Management</h2>
            <p class="text-gray-500 dark:text-gray-400 text-sm">Streamlining Your Sales Process.</p>
          </div>
          <div class="flex gap-2 mt-4 md:mt-0 items-center">
            <span class="text-sm text-gray-600 dark:text-gray-300">
              Total <span class="text-indigo-600 font-medium">{{ totalOrders }}</span> orders
            </span>

            <!-- Status Filter -->
            <div class="relative">
              <select
                v-model="selectedStatus"
                class="block appearance-none bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-600 text-sm text-gray-700 dark:text-gray-200 py-1.5 px-4 pr-8 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-indigo-200"
              >
                <option v-for="status in statusOptions" :key="status">{{ status }}</option>
              </select>
              <div class="pointer-events-none absolute inset-y-0 right-2 flex items-center text-gray-500 dark:text-gray-300">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
              </div>
            </div>

            <!-- Date Selector -->
            <button
              class="flex items-center gap-1 border border-gray-300 dark:border-gray-600 text-sm px-3 py-1.5 rounded-md bg-white dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-700 transition text-gray-700 dark:text-gray-200"
            >
              Today
              <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-gray-500 dark:text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3M5 11h14M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
              </svg>
            </button>

            <a href="/#"
            class="inline-flex items-center gap-2 bg-indigo-600 text-white px-4 py-2 rounded-lg text-sm hover:bg-indigo-700 transition">
            Add Stock
            </a>
          </div>
        </div>

        <!-- Table -->
        <div class="bg-white dark:bg-gray-800 shadow rounded-xl overflow-hidden">
          <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
            <thead class="bg-gray-50 dark:bg-gray-700 text-left text-sm font-medium text-gray-500 dark:text-gray-300">
              <tr>
                <th class="px-6 py-3">#</th>
                <th class="px-6 py-3">Item</th>
                <th class="px-6 py-3">Category</th>
                <th class="px-6 py-3">Stock</th>
                <th class="px-6 py-3">Status</th>
                <th class="px-6 py-3">Last Updated</th>
              </tr>
            </thead>
            <tbody class="divide-y divide-gray-100 dark:divide-gray-700 text-sm text-gray-700 dark:text-gray-200">
              <tr v-for="(item, index) in inventoryItems" :key="item.id" class="hover:bg-gray-50 dark:hover:bg-gray-700">
                <td class="px-6 py-4">{{ index + 1 }}</td>
                <td class="px-6 py-4 font-medium text-gray-900 dark:text-white">{{ item.name }}</td>
                <td class="px-6 py-4">{{ item.category }}</td>
                <td class="px-6 py-4">{{ item.stock }}</td>
                <td class="px-6 py-4">
                  <span
                    :class="[
                      'px-2 py-1 rounded-full text-xs font-semibold',
                      item.status === 'In Stock' ? 'bg-green-100 text-green-700 dark:bg-green-900 dark:text-green-300' :
                      item.status === 'Low Stock' ? 'bg-yellow-100 text-yellow-700 dark:bg-yellow-900 dark:text-yellow-300' :
                      'bg-red-100 text-red-700 dark:bg-red-900 dark:text-red-300'
                    ]"
                  >
                    {{ item.status }}
                  </span>
                </td>
                <td class="px-6 py-4">{{ item.updated }}</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </AppLayout>
  </template>

  <script setup lang="ts">
  import AppLayout from '@/layouts/AppLayout.vue';
  import { type BreadcrumbItem } from '@/types';
  import { Head } from '@inertiajs/vue3';

  const breadcrumbs: BreadcrumbItem[] = [
    { title: 'Inventory', href: '/inventory' },
  ];

  const totalOrders = 150;
  const statusOptions = ['All', 'In Stock', 'Out of Stock', 'Low Stock'];
  const selectedStatus = 'All';

  const inventoryItems = [
    { id: 'INV-001', name: 'Classic Cheeseburger', category: 'Burger', stock: 32, status: 'In Stock', updated: '2025-05-01' },
    { id: 'INV-002', name: 'French Fries', category: 'Sides', stock: 0, status: 'Out of Stock', updated: '2025-04-29' },
    { id: 'INV-003', name: 'Hot Coffee', category: 'Beverage', stock: 8, status: 'Low Stock', updated: '2025-04-30' },
    { id: 'INV-004', name: 'Veggie Pizza', category: 'Pizza', stock: 20, status: 'In Stock', updated: '2025-04-27' },
    { id: 'INV-005', name: 'Ice Coffee', category: 'Beverage', stock: 12, status: 'In Stock', updated: '2025-04-30' },
    { id: 'INV-006', name: 'Spaghetti Bolognese', category: 'Pasta', stock: 5, status: 'Low Stock', updated: '2025-04-28' },
    { id: 'INV-007', name: 'Grilled Chicken Salad', category: 'Salad', stock: 0, status: 'Out of Stock', updated: '2025-04-26' },
    { id: 'INV-008', name: 'Onion Rings', category: 'Sides', stock: 18, status: 'In Stock', updated: '2025-04-30' },
    { id: 'INV-009', name: 'Strawberry Smoothie', category: 'Beverage', stock: 2, status: 'Low Stock', updated: '2025-04-29' },
    { id: 'INV-010', name: 'BBQ Chicken Pizza', category: 'Pizza', stock: 14, status: 'In Stock', updated: '2025-04-27' },
    { id: 'INV-011', name: 'Tuna Sandwich', category: 'Sandwich', stock: 6, status: 'Low Stock', updated: '2025-04-30' },
    { id: 'INV-012', name: 'Lemonade', category: 'Beverage', stock: 0, status: 'Out of Stock', updated: '2025-04-29' },
    { id: 'INV-013', name: 'Chocolate Muffin', category: 'Dessert', stock: 10, status: 'In Stock', updated: '2025-04-30' },
    { id: 'INV-014', name: 'Caesar Salad', category: 'Salad', stock: 7, status: 'Low Stock', updated: '2025-04-28' }
  ];
  </script>
