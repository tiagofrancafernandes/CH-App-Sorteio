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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><title>brightness-contrast</title><rect x="15" y="2" width="2" height="3"></rect><rect x="27" y="15" width="3" height="2"></rect><rect x="15" y="27" width="2" height="3"></rect><rect x="2" y="15" width="3" height="2"></rect><rect x="6.22" y="5.73" width="2" height="3" transform="translate(-3 7.23) rotate(-45)"></rect><rect x="23.27" y="6.23" width="3" height="2" transform="translate(2.14 19.63) rotate(-45)"></rect><rect x="23.77" y="23.27" width="2" height="3" transform="translate(-10.26 24.77) rotate(-45)"></rect><polygon points="5.47 25.13 7.59 23 9 24.42 6.88 26.54 5.47 25.13"></polygon><path d="M16,8a8,8,0,1,0,8,8A8,8,0,0,0,16,8Zm0,14a6,6,0,0,1,0-12Z"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill:none"></rect></svg>

</template>
