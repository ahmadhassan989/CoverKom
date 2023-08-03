
<template>
  <div class="p-1 flex justify-end ml-2 mt-2">
    <a
      :href="url"
      class="link-button duration-150 ease-in-out focus:ring-offset-2 px-3 py-2 rounded transition"
      >{{ title }}</a
    >
  </div>
</template>
<script>
export default {
  props: ["title", "url"],
};
</script>

<style scoped>
.link-button {
  background: #008e95;
  color: #fff;
  font-size: smaller;
  font-weight: bold;
}
.link-button:hover {
  background: #FFF;
  color: #008e95;

}
</style>
