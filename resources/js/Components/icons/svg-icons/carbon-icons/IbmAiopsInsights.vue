<script setup>
import { computed } from 'vue';

const props = defineProps({
    size: {
        type: String,
        required: false,
    }
})

const allowedSizes = {
    default: '7',
    sm: '5',
    md: '7',
    lg: '16',
    xl: '32',
    xxl: '64',
}

const computedSize = computed(() => {
    if (!props?.size) {
        return allowedSizes.default;
    }

    if (!isNaN(parseInt(props?.size ?? null))) {
        let numVal = parseInt(props?.size ?? null);

        if (numVal < 0 || numVal > 100) {
            return allowedSizes.default;
        }

        return numVal;
    }

    if (props?.size in allowedSizes) {
        return allowedSizes[`${props?.size}`] ?? allowedSizes.default;
    }

    return allowedSizes.default;
})
</script>

<template>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><polygon points="5.5 23 2 30 9 30 5.5 23"></polygon><path d="m26,15v2c1.1025,0,2,.8975,2,2v5c0,1.1025-.8975,2-2,2H10v2h16c2.2061,0,4-1.7939,4-4v-5c0-2.2056-1.7939-4-4-4Z"></path><path d="m14,24c-.4463,0-.8389-.2959-.9614-.7251l-1.793-6.2749h-3.2456v-2h4c.4463,0,.8389.2959.9614.7251l1.0386,3.6348,3.0386-10.6348c.1226-.4292.5151-.7251.9614-.7251s.8389.2959.9614.7251l1.793,6.2749h3.2456v2h-4c-.4463,0-.8389-.2959-.9614-.7251l-1.0386-3.6348-3.0386,10.6348c-.1226.4292-.5151.7251-.9614.7251Z"></path><path d="m4,13v-5c0-1.103.897-2,2-2h16v-2H6c-2.2056,0-4,1.7944-4,4v5c0,2.2056,1.7944,4,4,4v-2c-1.103,0-2-.897-2-2Z"></path><circle cx="27" cy="5" r="3"></circle><g id="_Transparent_Rectangle_" data-name="&amp;lt;Transparent Rectangle&amp;gt;"><rect class="cls-1" width="32" height="32" style="fill: none"></rect></g></svg>

</template>
