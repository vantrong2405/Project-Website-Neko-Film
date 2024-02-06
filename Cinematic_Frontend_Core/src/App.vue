<template>
  <component :is="layout">
    <router-view></router-view>
  </component>
</template>

<script>
const default_layout = "default";
export default {
  computed: {
    layout() {
      return this.$route.meta.layout + "-layout";
    },
  },
};
</script>
<style></style>