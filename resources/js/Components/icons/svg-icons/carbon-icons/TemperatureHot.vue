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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><rect x="26" y="13" width="4" height="2"></rect><rect x="23.1214" y="5.879" width="3.9999" height="1.9998" transform="translate(2.4937 19.7783) rotate(-45)"></rect><rect x="24.1212" y="19.1214" width="1.9998" height="3.9999" transform="translate(-7.5773 23.9496) rotate(-45)"></rect><rect x="17" y="2" width="2" height="4"></rect><path d="M18,8a6.0365,6.0365,0,0,0-1,.09v2.0518A3.9567,3.9567,0,0,1,18,10a4,4,0,0,1,0,8v2A6,6,0,0,0,18,8Z"></path><path d="M10,20.1839V7H8V20.1839a3,3,0,1,0,2,0Z"></path><path d="M9,30A6.9931,6.9931,0,0,1,4,18.1108V7A5,5,0,0,1,14,7V18.1108A6.9931,6.9931,0,0,1,9,30ZM9,4A3.0033,3.0033,0,0,0,6,7V18.9834l-.332.2983a5,5,0,1,0,6.664,0L12,18.9834V7A3.0033,3.0033,0,0,0,9,4Z"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
