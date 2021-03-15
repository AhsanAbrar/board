<template>
  <div :id="name" class="dropdown relative">
    <div :id="name + '-trigger'" @click.prevent="isOpen = !isOpen, $emit('toggle')">
      <slot name="trigger"/>
    </div>

    <transition
      enter-active-class="transition ease-out duration-100"
      enter-from-class="transform opacity-0 scale-95"
      enter-to-class="transform opacity-100 scale-100"
      leave-active-class="transition ease-in duration-75"
      leave-from-class="transform opacity-100 scale-100"
      leave-to-class="transform opacity-0 scale-95"
    >
      <slot v-if="isOpen"/>
    </transition>
  </div>
</template>

<script>
  import { ref, watch } from 'vue'

  export default {
    props: {
      name: String,
      closeOutside: Boolean,
    },

    emits: ['toggle'],

    setup({name, closeOutside}) {
      let isOpen = ref(false)

      watch(isOpen, (current, prev) => {
        if (current)
          document.addEventListener('click', closeOutside ? closeIfClickedOutside : closeOnClick)
        else
          document.removeEventListener('click', closeOutside ? closeIfClickedOutside : closeOnClick)
      })

      function closeIfClickedOutside(event) {
        if (! event.target.closest(`#${name}`))
          isOpen.value = false
      }

      function closeOnClick(event) {
        if (! event.target.closest(`#${name}-trigger`))
          isOpen.value = false
      }

      return {
        isOpen
      }
    }
  }
</script>
