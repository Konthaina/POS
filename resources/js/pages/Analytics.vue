<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import { Head } from '@inertiajs/vue3';
import { Line } from 'vue-chartjs';
import {
  Chart as ChartJS,
  Title,
  Tooltip,
  Legend,
  LineElement,
  PointElement,
  CategoryScale,
  LinearScale,
  Filler
} from 'chart.js';

ChartJS.register(Title, Tooltip, Legend, LineElement, PointElement, CategoryScale, LinearScale, Filler);

const breadcrumbs: BreadcrumbItem[] = [{ title: 'Analytics', href: '/analytics' }];

const chartData = {
  labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
  datasets: [
    {
      label: 'Sales',
      data: [35, 50, 45, 70, 95, 90],
      borderColor: '#22c55e',
      backgroundColor: 'rgba(34, 197, 94, 0.1)',
      tension: 0.4,
      fill: true,
      pointRadius: 0,
      borderWidth: 2
    }
  ]
};

const chartOptions = {
  responsive: true,
  maintainAspectRatio: false,
  scales: {
    x: {
      grid: { color: '#374151' }, // dark gray
      ticks: {
        color: '#d1d5db', // text-gray-300
        font: { size: 12 }
      }
    },
    y: {
      beginAtZero: true,
      grid: { color: '#374151' },
      ticks: {
        color: '#d1d5db',
        font: { size: 12 }
      }
    }
  },
  plugins: {
    legend: { display: false },
    tooltip: { enabled: true }
  }
};

const trendingItems = [
  { rank: 1, image: 'hotcoffee.png', name: 'Plant-Based Burger', category: 'Pizza', sales: 524, percent: 12 },
  { rank: 2, image: 'icecoffee.png', name: 'Loaded Nachos', category: 'Juice', sales: 224, percent: 12 },
  { rank: 3, image: 'hotcoffee.png', name: 'Chicken Sandwich with Spicy Sauce', category: 'Burger', sales: 124, percent: 12 },
  { rank: 4, image: 'icecoffee.png', name: 'Gourmet Fries with Toppings', category: 'Pizza', sales: 104, percent: 12 }
];

const favoriteItems = [
  { image: 'hotcoffee.png', name: 'Mushroom Swiss Burger', rating: 5, views: '12.5k' },
  { image: 'icecoffee.png', name: 'Classic Cheeseburger', rating: 5, views: '12.5k' },
  { image: 'hotcoffee.png', name: 'Pizza Meal for Kids (Small size)', rating: 5, views: '12.5k' },
  { image: 'icecoffee.png', name: 'Rice Chicken', rating: 5, views: '12.5k' }
];

const sellingItems = [
  { image: 'icecoffee.png', name: 'Cheeseburger', price: '$15.24', description: 'Serves for 4 Person 2hmins' },
  { image: 'hotcoffee.png', name: 'Chicken Nuggets', price: '$15.24', description: 'Serves for 4 Person 2hmins' },
  { image: 'icecoffee.png', name: 'French Fries', price: '$15.24', description: 'Serves for 4 Person 2hmins' },
  { image: 'hotcoffee.png', name: 'Pepperoni Pizza', price: '$15.24', description: 'Serves for 4 Person 2hmins' },
  { image: 'icecoffee.png', name: 'Hot Dog', price: '$15.24', description: 'Serves for 4 Person 2hmins' },
  { image: 'hotcoffee.png', name: 'Fish and Chips', price: '$15.24', description: 'Serves for 4 Person 2hmins' }
];
</script>

<template>
  <Head title="Analytics" />
  <AppLayout :breadcrumbs="breadcrumbs">
    <div class="p-4 space-y-6">
      <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
        <div>
          <h2 class="text-2xl font-bold text-gray-900 dark:text-white">Analytics</h2>
          <p class="text-sm text-gray-500 dark:text-gray-400">Insights to Drive Sales Performance and Business Growth.</p>
        </div>

        <a href="/pointofsale"
          class="inline-flex items-center gap-2 bg-indigo-600 text-white px-4 py-2 rounded-lg text-sm hover:bg-indigo-700 transition">
          New Order
        </a>
      </div>

      <!-- Trending + Chart -->
      <div class="grid md:grid-cols-2 gap-4">
        <!-- Trending -->
        <div class="bg-white dark:bg-gray-800 p-4 rounded-xl shadow">
          <h3 class="text-lg font-semibold mb-2 text-gray-900 dark:text-white">Trending Items</h3>
          <ul class="space-y-3">
            <li v-for="item in trendingItems" :key="item.rank" class="flex items-center justify-between">
              <div class="flex items-center gap-3">
                <img :src="item.image" class="w-12 h-12 rounded-md object-cover" />
                <div>
                  <p class="font-medium text-gray-900 dark:text-white">{{ item.name }}</p>
                  <small class="text-gray-500 dark:text-gray-400">{{ item.category }}</small>
                </div>
              </div>
              <div class="text-right">
                <p class="font-semibold text-gray-900 dark:text-white">+{{ item.sales }}</p>
                <small class="text-green-500">↑ {{ item.percent }}%</small>
              </div>
            </li>
          </ul>
        </div>

        <!-- Line Chart -->
        <div class="bg-white dark:bg-gray-800 p-6 rounded-xl shadow">
          <h2 class="text-lg font-semibold mb-4 text-gray-900 dark:text-white">Chart Orders</h2>
          <div class="h-72">
            <Line :data="chartData" :options="chartOptions" />
          </div>
        </div>
      </div>

      <!-- Favorite Items -->
      <div>
        <h3 class="text-lg font-semibold mb-2 text-gray-900 dark:text-white">Most Favorites Items</h3>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
          <div v-for="item in favoriteItems" :key="item.name" class="bg-white dark:bg-gray-800 rounded-xl shadow">
            <img :src="item.image" class="rounded-t-xl h-32 w-full object-cover" />
            <div class="p-3">
              <p class="font-semibold text-gray-900 dark:text-white">{{ item.name }}</p>
              <div class="text-sm text-gray-500 dark:text-gray-400">★ {{ item.rating }} • {{ item.views }} views</div>
            </div>
          </div>
        </div>
      </div>

      <!-- Most Selling Items -->
      <div>
        <h3 class="text-lg font-semibold mb-2 text-gray-900 dark:text-white">Most Selling Items</h3>
        <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
          <div v-for="item in sellingItems" :key="item.name"
            class="bg-white dark:bg-gray-800 p-3 rounded-xl shadow flex items-center gap-3">
            <img :src="item.image" class="w-16 h-16 rounded object-cover" />
            <div>
              <p class="font-semibold text-gray-900 dark:text-white">{{ item.name }}</p>
              <p class="text-sm text-gray-500 dark:text-gray-400">{{ item.description }}</p>
              <p class="text-indigo-600 font-bold">{{ item.price }}</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </AppLayout>
</template>
