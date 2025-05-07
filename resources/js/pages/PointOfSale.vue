<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { Head } from '@inertiajs/vue3';
import { ref, computed } from 'vue';

const categories = ['Meals', 'Burgers', 'Sandwiches', 'Sides', 'Drinks'];
const activeCategory = ref('Burgers');
const search = ref('');

const products = ref([
  { id: 1, name: 'Classic Cheeseburger', price: 8.99, image: 'Logoeden.png', rating: 4 },
  { id: 2, name: 'Bacon Avocado Burger', price: 10.99, image: 'Logoeden.png', rating: 5 },
  { id: 3, name: 'BBQ Pulled Pork Burger', price: 11.49, image: 'Logoeden.png', rating: 4 },
  { id: 4, name: 'Mushroom Swiss Burger', price: 10.49, image: 'Logoeden.png', rating: 4 },
  { id: 5, name: 'Mediterranean Lamb Burger', price: 12.99, image: 'Logoeden.png', rating: 5 },
  { id: 6, name: 'Veggie Black Bean Burger', price: 8.49, image: 'Logoeden.png', rating: 4 },
  { id: 7, name: 'Spicy Jalapeño Burger', price: 9.99, image: 'Logoeden.png', rating: 5 },
  { id: 8, name: 'Teriyaki Chicken Burger', price: 10.99, image: 'Logoeden.png', rating: 4 },
  { id: 9, name: 'Buffalo Chicken Burger', price: 11.49, image: 'Logoeden.png', rating: 5 },
  { id: 10, name: 'Fish Fillet Burger', price: 9.49, image: 'Logoeden.png', rating: 4 },
  { id: 11, name: 'Grilled Chicken Burger', price: 10.49, image: 'Logoeden.png', rating: 5 },
  { id: 12, name: 'Teriyaki Chicken Burger', price: 10.99, image: 'Logoeden.png', rating: 4 },
  { id: 13, name: 'Buffalo Chicken Burger', price: 11.49, image: 'Logoeden.png', rating: 5 },
  { id: 14, name: 'Fish Fillet Burger', price: 9.49, image: 'Logoeden.png', rating: 4 },
]);

const cart = ref<any[]>([]);

const total = computed(() =>
  cart.value.reduce((sum, item) => sum + item.price * item.quantity, 0)
);

function addToCart(product: any) {
  const existing = cart.value.find(i => i.id === product.id);
  if (existing) {
    existing.quantity++;
  } else {
    cart.value.push({ ...product, quantity: 1, code: Math.floor(10000 + Math.random() * 99999) });
  }
}

function increase(id: number) {
  const item = cart.value.find(i => i.id === id);
  if (item) item.quantity++;
}

function decrease(id: number) {
  const item = cart.value.find(i => i.id === id);
  if (item && item.quantity > 1) item.quantity--;
}

function removeItem(id: number) {
  cart.value = cart.value.filter(i => i.id !== id);
}
</script>

<template>
  <Head title="Point of Sale" />
  <AppLayout>
    <div class="flex flex-col lg:flex-row gap-6 p-4">
      <!-- LEFT: Product List -->
      <div class="w-full lg:w-2/3 flex flex-col max-h-[90vh]">
        <div class="flex justify-between items-center mb-4">
          <h2 class="text-2xl font-semibold text-gray-900 dark:text-white">New Order</h2>
          <div class="flex gap-2">
            <input
              type="text"
              placeholder="Search order ID..."
              class="rounded-lg border border-gray-300 dark:border-gray-700 px-4 py-2 text-sm w-full md:w-64 focus:outline-none focus:ring focus:ring-indigo-200 bg-white dark:bg-gray-800 text-gray-700 dark:text-gray-200"
            />
          </div>
        </div>

        <!-- Category Tabs -->
        <div class="flex gap-4 mb-4">
          <button
            v-for="cat in categories"
            :key="cat"
            @click="activeCategory = cat"
            :class="[
              'px-4 py-1.5 rounded-full text-sm font-medium transition',
              cat === activeCategory
                ? 'bg-indigo-100 text-indigo-600 dark:bg-indigo-800 dark:text-white'
                : 'text-gray-500 dark:text-gray-300 hover:text-indigo-600 dark:hover:text-indigo-400'
            ]"
          >
            {{ cat }}
          </button>
        </div>

        <!-- Scrollable Product Grid -->
        <div class="overflow-y-auto pr-1 scrollbar-hide" style="max-height: calc(100vh - 180px)">
          <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4 pb-2">
            <div
              v-for="product in products"
              :key="product.id"
              class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border dark:border-gray-700 overflow-hidden"
            >
              <img :src="product.image" class="w-full h-36 object-cover" />
              <div class="p-4">
                <h3 class="font-semibold text-gray-800 dark:text-gray-100 text-sm">{{ product.name }}</h3>
                <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">${{ product.price.toFixed(2) }}</p>
                <div class="flex items-center justify-between mt-3">
                  <div class="text-yellow-400 text-xs">★★★★★</div>
                  <button
                    @click="addToCart(product)"
                    class="bg-indigo-100 dark:bg-indigo-600 text-indigo-600 dark:text-white rounded-full w-7 h-7 flex items-center justify-center text-lg hover:bg-indigo-600 hover:text-white"
                  >
                    +
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- RIGHT: Cart Section -->
      <div class="w-full lg:w-1/3">
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow p-6 border dark:border-gray-700">
          <div class="flex justify-between items-center mb-4">
            <h2 class="text-2xl font-bold text-indigo-600 dark:text-indigo-400">Your cart</h2>
          </div>

          <div class="space-y-4 max-h-[400px] overflow-y-auto scrollbar-hide">
            <div
              v-for="item in cart"
              :key="item.id"
              class="flex items-center gap-3"
            >
              <img :src="item.image" class="w-14 h-14 rounded-lg object-cover" />
              <div class="flex-1">
                <h4 class="font-semibold text-sm text-gray-800 dark:text-gray-100">{{ item.name }}</h4>
                <p class="text-xs text-gray-500 dark:text-gray-400">Code: {{ item.code }}</p>
                <p class="text-sm font-medium text-gray-900 dark:text-white">${{ item.price.toFixed(2) }}</p>
              </div>
              <div class="flex items-center gap-1">
                <button @click="decrease(item.id)" class="bg-gray-200 dark:bg-gray-700 px-2 rounded text-gray-700 dark:text-white">-</button>
                <span class="text-gray-800 dark:text-white">{{ item.quantity }}</span>
                <button @click="increase(item.id)" class="bg-indigo-600 text-white px-2 rounded">+</button>
              </div>
              <button @click="removeItem(item.id)" class="text-gray-400 hover:text-red-500 text-lg">🗑️</button>
            </div>
          </div>

          <div class="pt-4 mt-4 border-t dark:border-gray-700">
            <div class="flex justify-between text-lg font-bold text-gray-900 dark:text-white">
              <span>Total:</span>
              <span>${{ total.toFixed(2) }}</span>
            </div>
            <button
              class="mt-4 w-full bg-indigo-600 text-white py-3 rounded-lg hover:bg-indigo-700 transition"
            >
              Continue to check out
            </button>
          </div>
        </div>
      </div>
    </div>
  </AppLayout>
</template>
