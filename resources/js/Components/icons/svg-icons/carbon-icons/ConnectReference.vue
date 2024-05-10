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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><polygon points="4 20 4 22 8.586 22 2 28.586 3.414 30 10 23.414 10 28 12 28 12 20 4 20"></polygon><path d="M23,16c-1.5696,0-3.0124,.5159-4.1813,1.3919l-4.2173-4.2174c.876-1.1689,1.3986-2.6048,1.3986-4.1745,0-3.8599-3.1406-7-7-7S2,5.1401,2,9s3.1406,7,7,7c1.5696,0,3.0184-.5355,4.1873-1.4114l4.2173,4.2174c-.8759,1.1689-1.4046,2.6243-1.4046,4.194,0,3.8599,3.1406,7,7,7s7-3.1401,7-7-3.1406-7-7-7ZM4,9c0-2.7568,2.2432-5,5-5s5,2.2432,5,5-2.2432,5-5,5-5-2.2432-5-5Z"></path><rect id="_Transparent_Rectangle_" data-name="&amp;lt;Transparent Rectangle&amp;gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
