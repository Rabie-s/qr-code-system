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

    <div class="bg-gray-200 p-5 m-5 rounded-2xl absolute bottom-0 right-0 left-0 transition delay-150 duration-300 ease-in-out hover:-translate-y-1 hover:scale-110 cursor-pointer">
      <div class="flex items-center justify-around">
        <h3 class=" text-base">{{ user.name }}</h3>
        <div>
          <FontAwesomeIcon @click="logout"
            class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white
            hover:text-amber-500 cursor-pointer "
            icon="right-from-bracket" />
        </div>
      </div>
    </div>

  </fwb-sidebar>
</template>
<script setup>
import { usePage,router } from '@inertiajs/vue3';
import { FwbSidebar, FwbSidebarItem } from 'flowbite-vue'
import { computed } from 'vue';

const page = usePage()
const user = computed(()=>page.props?.auth?.user||'')


function logout() {
  router.post(route('user.auth.logoutUser'));
}
</script>