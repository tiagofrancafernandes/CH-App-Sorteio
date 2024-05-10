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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><path d="M10,30H8V27H4v3H2V27a2.0023,2.0023,0,0,1,2-2H8a2.0023,2.0023,0,0,1,2,2Z"></path><path d="M30,30H28V27H24v3H22V27a2.0023,2.0023,0,0,1,2-2h4a2.0023,2.0023,0,0,1,2,2Z"></path><path d="M20,30H18V27H14v3H12V27a2.0023,2.0023,0,0,1,2-2h4a2.0023,2.0023,0,0,1,2,2Z"></path><circle cx="16" cy="22" r="2"></circle><circle cx="6" cy="22" r="2"></circle><circle cx="26" cy="22" r="2"></circle><circle cx="21" cy="18" r="2"></circle><circle cx="11" cy="18" r="2"></circle><path d="M26,14H6a2.0023,2.0023,0,0,1-2-2V4A2.0023,2.0023,0,0,1,6,2H26a2.0023,2.0023,0,0,1,2,2v8A2.0023,2.0023,0,0,1,26,14ZM6,4v8H26V4Z"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
