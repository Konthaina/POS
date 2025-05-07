<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import { Head } from '@inertiajs/vue3';
import PlaceholderPattern from '../components/PlaceholderPattern.vue';
import { DollarSign, ClipboardList, Utensils,ShoppingCart } from 'lucide-vue-next';


const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Dashboard',
        href: '/dashboard',
    },
];

defineProps<{
    name?: string;
}>();

import { Bar } from 'vue-chartjs';
import {
  Chart as ChartJS,
  Title,
  Tooltip,
  Legend,
  BarElement,
  CategoryScale,
  LinearScale
} from 'chart.js';

ChartJS.register(Title, Tooltip, Legend, BarElement, CategoryScale, LinearScale);

const chartData = {
  labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri'],
  datasets: [
    {
      label: 'Weekly Sales',
      data: [120, 150, 300, 200, 250],
      backgroundColor: [
        // '#4f46e5', // indigo
        // '#10b981', // emerald
        // '#f59e0b', // amber
        // '#ef4444', // red
        // '#3b82f6'  // blue
        '#f59e0b', // amber
        '#f59e0b', // amber
        '#f59e0b', // amber
        '#f59e0b', // amber
        '#f59e0b', // amber

      ],
      borderRadius: 6
    }
  ]
};


const chartOptions = {
  responsive: true,
  maintainAspectRatio: false,
  plugins: {
    legend: {
      position: 'top'
    }
  }
};

</script>

<template>
  <Head title="Dashboard" />

  <AppLayout :breadcrumbs="breadcrumbs">
    <div class="flex h-full flex-1 flex-col gap-4 rounded-xl p-4">
      <!-- Header with POS Button -->
      <div class="flex items-center justify-between">
        <div>
          <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Dashboard</h1>
          <p class="text-sm text-gray-500">Optimize Revenue and Track Sales Performance.</p>
        </div>
        <a
        href="/pointofsale"
        class="inline-flex items-center gap-2 bg-indigo-600 text-white px-4 py-2 rounded-lg text-sm hover:bg-indigo-700 transition"
        >
        <ShoppingCart class="w-4 h-4" />
        Point of Sale
        </a>

      </div>

      <!-- Top Stats -->
      <div class="grid gap-4 grid-cols-1 md:grid-cols-2 lg:grid-cols-4">
        <div class="bg-white dark:bg-gray-800 p-5 rounded-xl shadow border border-gray-200 dark:border-gray-700">
          <div class="flex items-center justify-between">
            <div class="text-sm text-gray-500">Total Revenue</div>
            <span class="text-green-500">📈</span>
          </div>
          <div class="mt-1 text-2xl font-bold text-gray-900 dark:text-white">$29,960</div>
        </div>
        <div class="bg-white dark:bg-gray-800 p-5 rounded-xl shadow border border-gray-200 dark:border-gray-700">
          <div class="flex items-center justify-between">
            <div class="text-sm text-gray-500">Total Orders</div>
            <span class="text-blue-500">📦</span>
          </div>
          <div class="mt-1 text-2xl font-bold text-gray-900 dark:text-white">125</div>
        </div>
        <div class="bg-white dark:bg-gray-800 p-5 rounded-xl shadow border border-gray-200 dark:border-gray-700">
          <div class="flex items-center justify-between">
            <div class="text-sm text-gray-500">Total Client</div>
            <span class="text-purple-500">👥</span>
          </div>
          <div class="mt-1 text-2xl font-bold text-gray-900 dark:text-white">102</div>
        </div>
        <div class="bg-white dark:bg-gray-800 p-5 rounded-xl shadow border border-gray-200 dark:border-gray-700">
          <div class="flex items-center justify-between">
            <div class="text-sm text-gray-500">Total Menus</div>
            <span class="text-amber-500">🍽️</span>
          </div>
          <div class="mt-1 text-2xl font-bold text-gray-900 dark:text-white">60</div>
        </div>
      </div>

      <!-- Today's Upsale + Chart Section -->
      <div class="flex flex-col lg:flex-row gap-4 w-full">
        <!-- Today's Upsale -->
        <div class="w-full lg:w-1/3 bg-white dark:bg-gray-800 p-6 rounded-xl shadow border border-gray-200 dark:border-gray-700">
          <div class="flex items-center justify-between mb-3">
            <h2 class="text-lg font-semibold text-gray-800 dark:text-white">Today's Upsale</h2>
            <a href="#" class="text-sm text-indigo-600 hover:underline">See all</a>
          </div>
          <ul class="text-sm text-gray-600 dark:text-gray-300 space-y-3">
            <li class="flex justify-between">
              <div>🍗 Roast chicken<br /><span class="text-xs text-gray-400">Order: 120</span></div>
              <strong>$3,783</strong>
            </li>
            <li class="flex justify-between">
              <div>🍝 Paste<br /><span class="text-xs text-gray-400">Order: 12</span></div>
              <strong>$9,816</strong>
            </li>
            <li class="flex justify-between">
              <div>☕ Black Coffee<br /><span class="text-xs text-gray-400">Order: 51</span></div>
              <strong>$1,420</strong>
            </li>
            <li class="flex justify-between">
              <div>🍲 Soup<br /><span class="text-xs text-gray-400">Order: 61</span></div>
              <strong>$5,126</strong>
            </li>
            <li class="flex justify-between">
              <div>🍞 Bread<br /><span class="text-xs text-gray-400">Order: 77</span></div>
              <strong>$4,645</strong>
            </li>
            <li class="flex justify-between">
              <div>🍪 Cookie<br /><span class="text-xs text-gray-400">Order: 21</span></div>
              <strong>$5,116</strong>
            </li>
          </ul>
        </div>

        <!-- Chart Section -->
        <div class="w-full lg:w-2/3 bg-white dark:bg-gray-800 p-4 rounded-xl shadow border border-gray-200 dark:border-gray-700 min-h-[300px] md:min-h-[400px] lg:min-h-[500px]">
          <!-- <div class="flex justify-between items-center mb-2">
            <h2 class="text-lg font-semibold text-gray-800 dark:text-white">Accepted Orders</h2>
            <select class="text-sm border rounded px-2 py-1 dark:bg-gray-700 dark:text-white">
              <option>Week</option>
              <option>Month</option>
            </select>
          </div> -->
          <Bar :data="chartData" :option="chartOptions" />
        </div>
      </div>
    </div>
  </AppLayout>
</template>



