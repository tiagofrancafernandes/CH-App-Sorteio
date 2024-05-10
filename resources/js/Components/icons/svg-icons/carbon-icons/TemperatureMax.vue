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
    <svg xmlns="http://www.w3.org/2000/svg" data-name="Layer 1" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><rect x="20" y="10" width="7" height="2"></rect><rect x="20" y="16" width="10" height="2"></rect><rect x="20" y="22" width="7" height="2"></rect><path d="M10,20.1839V7H8V20.1839a3,3,0,1,0,2,0Z" transform="translate(0 0)"></path><path d="M30,4H12.9744A4.9829,4.9829,0,0,0,4,7V18.1108a7,7,0,1,0,10,0V7a5.0019,5.0019,0,0,0-.1011-1H30ZM9,28a4.9933,4.9933,0,0,1-3.332-8.7183L6,18.9834V7a3,3,0,0,1,6,0V18.9834l.332.2983A4.9933,4.9933,0,0,1,9,28Z" transform="translate(0 0)"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
