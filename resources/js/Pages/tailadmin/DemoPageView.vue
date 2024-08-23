<script setup lang="ts">
import { ref } from 'vue'
import CalendarCard from '@/Components/CalendarCard.vue'
import TailAdminLayout from '@/Layouts/TailAdminLayout.vue'

const pageTitle = ref('Demo Page View')
</script>

<template>
  <TailAdminLayout
    :pageTitle="pageTitle"
  >
    <div class="mx-auto max-w-7xl">
        <h5 class="text-gray-700 dark:text-gray-50 text-2xl">DemoPageView</h5>
        <pre class="my-4 text-gray-700 dark:text-gray-50 text-md">resources/js/Pages/tailadmin/DemoPageView.vue</pre>
      <!-- <CalendarCard /> -->
    </div>
  </TailAdminLayout>
</template>
