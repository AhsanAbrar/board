<template>
  <div class="flex mb-4">
    <h1 class="text-2xl font-semibold text-gray-900" data-cy="page-title">{{ title }}</h1>

    <slot/>

    <router-link :to="btnTo" custom v-slot="{ navigate }" v-if="btnText && can(permission)">
      <v-button class="ml-auto" @click="navigate" data-cy="topbar-create-button">{{ btnText }}</v-button>
    </router-link>
  </div>
</template>

<script>
  export default {
    props: {
      title: String,
      btnTo: String,
      btnText: String,
      permission: String,
    }
  }
</script>
