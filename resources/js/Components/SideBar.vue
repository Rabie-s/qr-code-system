<template>
  <fwb-sidebar>

    <fwb-sidebar-item>
      <template #icon>
        <FontAwesomeIcon
          class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
          icon="gauge" />
      </template>
      <template #default>Dashboard</template>
    </fwb-sidebar-item>

    <fwb-sidebar-item>
      <template #icon>
        <FontAwesomeIcon
          class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
          icon="gauge" />
      </template>
      <template #default>Dashboard</template>
    </fwb-sidebar-item>

  </fwb-sidebar>
</template>
<script setup>
import { FwbSidebar, FwbSidebarItem } from 'flowbite-vue'

function logout() {
  router.post(route('user.auth.logoutUser'));
}
</script>