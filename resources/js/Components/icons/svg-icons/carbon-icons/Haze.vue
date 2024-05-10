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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><title>haze</title><path d="M19,28H3a1,1,0,0,1,0-2H19a1,1,0,0,1,0,2Z"></path><path d="M15,20H3a1,1,0,0,1,0-2H15a1,1,0,0,1,0,2Z"></path><rect x="24.5" y="23.5" width="4" height="2" transform="translate(25.0858 -11.5624) rotate(45)"></rect><rect x="28" y="15" width="4" height="2"></rect><rect x="24.5" y="6.5" width="4" height="2" transform="translate(2.4584 20.935) rotate(-45)"></rect><rect x="17" y="2" width="2" height="4"></rect><rect x="7.5" y="6.5" width="4" height="2" transform="translate(10.9142 19.5208) rotate(-135)"></rect><path d="M18,8a8.0092,8.0092,0,0,0-8,8h2a6,6,0,1,1,6,6H7a1,1,0,0,0,0,2H18A8,8,0,0,0,18,8Z"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill:none"></rect></svg>

</template>
