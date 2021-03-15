<template>
  <a
    :href="href"
    :class="[classes]"
    v-if="href"
  >
    <slot/>
    <v-loader class="ml-2" :color="loaderColor" v-if="processing"/>
  </a>

  <button :class="[classes]" :disabled="disabled || processing" v-else>
    <slot/>
    <v-loader class="ml-2" :color="loaderColor" v-if="processing"/>
  </button>
</template>

<script>
  export default {
    props: {
      href: String,
      processing: Boolean,
      disabled: Boolean,
      white: Boolean,
      danger: Boolean,
      size: {
        type: String,
        default: 'md'
      }
    },

    setup({white, danger, size}) {
      let classes = 'inline-flex items-center border font-medium shadow-sm focus:outline-none focus:ring-2 focus:ring-offset-2'
      let sizes = {
        xs: ' px-2.5 py-1.5 text-xs rounded',
        sm: ' px-3 py-2 text-sm leading-4 rounded-md',
        md: ' px-4 py-2 text-sm rounded-md',
        lg: ' px-4 py-2 text-base rounded-md',
        xl: ' px-6 py-3 text-base rounded-md',
      }
      let whiteClass = ' text-gray-700 border-gray-300 bg-white hover:bg-gray-50 focus:ring-indigo-500'
      let dangerClass = ' text-white border-transparent bg-red-600 hover:bg-red-700 focus:ring-red-500'
      let defaultClass = ' text-white border-transparent bg-indigo-600 hover:bg-indigo-700 focus:ring-indigo-500'
      let loaderColor = white ? '' : 'text-white'

      if (white)
        classes = classes.concat(whiteClass, sizes[size])
      else if (danger)
        classes = classes.concat(dangerClass, sizes[size])
      else
        classes = classes.concat(defaultClass, sizes[size])

      return {
        classes,
        loaderColor
      }
    }
  }
</script>
