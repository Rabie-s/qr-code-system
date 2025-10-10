<template>
  <div class="flex min-h-screen">
    <!-- Sidebar -->
    <SideBar class="w-64 fixed h-screen" />

    <!-- Main content -->
    <div class="flex-1 ml-64 relative min-h-screen p-4">
      <!-- Toast message -->
      <div
        v-if="page.props.flash.message"
        class="fixed top-4 right-4 z-50"
      >
        <fwb-toast closable type="success">
          {{ page.props.flash.message }}
        </fwb-toast>
      </div>

      <!-- Page content -->
      <slot />
    </div>
  </div>
</template>

<script setup lang="ts">
import { FwbToast } from 'flowbite-vue'
import SideBar from '@/Components/SideBar.vue'
import { usePage } from '@inertiajs/vue3'

const page:any = usePage()
</script>
