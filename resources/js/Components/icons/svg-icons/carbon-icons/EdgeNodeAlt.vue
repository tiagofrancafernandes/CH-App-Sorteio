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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><path d="M27,22a2.981,2.981,0,0,0-2.0374.811l-4.0039-2.4023a2.0429,2.0429,0,0,0,0-.8174l4.0039-2.4023A2.9909,2.9909,0,1,0,24,15a2.9345,2.9345,0,0,0,.0415.4092l-4.0039,2.4023a3,3,0,1,0,0,4.377l4.0039,2.4023A2.9345,2.9345,0,0,0,24,25a3,3,0,1,0,3-3Zm0-8a1,1,0,1,1-1,1A1.0009,1.0009,0,0,1,27,14Zm-9,7a1,1,0,1,1,1-1A1.0009,1.0009,0,0,1,18,21Zm9,5a1,1,0,1,1,1-1A1.0009,1.0009,0,0,1,27,26Z" transform="translate(0 0)"></path><circle cx="7" cy="8" r="1"></circle><circle cx="7" cy="16" r="1"></circle><circle cx="7" cy="24" r="1"></circle><path d="M22,13V5a2.0023,2.0023,0,0,0-2-2H4A2.0023,2.0023,0,0,0,2,5V27a2.0023,2.0023,0,0,0,2,2H20V27H4V21h8V19H4V13ZM4,5H20v6H4Z" transform="translate(0 0)"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
