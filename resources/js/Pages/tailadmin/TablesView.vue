<script setup lang="ts">
import { ref } from 'vue'
import TableOne from '@/Components/Tables/TableOne.vue'
import TableTwo from '@/Components/Tables/TableTwo.vue'
import TableThree from '@/Components/Tables/TableThree.vue'
import CustomTable from '@/Components/Tables/CustomTable.vue'
// import TailAdminLayout from '@/Layouts/TailAdminLayout.vue'
import TailAdminLayout from '@/Layouts/TailAdminLayout.vue';

const pageTitle = ref('Tables')
</script>

<template>
  <TailAdminLayout>

    <div class="flex flex-col gap-10">
      <!-- <CustomTable /> -->
      <!-- <TableOne /> -->
      <!-- <TableTwo /> -->
      <TableThree />
    </div>
  </TailAdminLayout>
</template>
