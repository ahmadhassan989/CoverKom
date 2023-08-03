<script setup>
defineProps(['type', 'hrefAttr']);
</script>
<template>
    <button
    :type="$page.props.orders"
    :href="$page.props.hrefAttr"
        class="inline-flex items-center px-4 py-2 red-button border mustopha border-transparent rounded-md  text-white uppercase tracking-widest focus:ring-offset-2 transition ease-in-out duration-150"
    >
        <slot />
    </button>
</template>
