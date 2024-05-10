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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><circle cx="7" cy="7" r="1"></circle><circle cx="7" cy="15" r="1"></circle><circle cx="7" cy="23" r="1"></circle><path d="M12,26H4V20h8V18H4V12H22V4a2,2,0,0,0-2-2H4A2,2,0,0,0,2,4V26a2,2,0,0,0,2,2h8ZM4,4H20v6H4Z" transform="translate(0 0)"></path><path d="M28,17v2.4131A6.996,6.996,0,1,0,22,30V28a5,5,0,1,1,4.5762-7H24v2h6V17Z" transform="translate(0 0)"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
