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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><path d="M12,5A3.0033,3.0033,0,0,0,9,2H4V15H9a3.0033,3.0033,0,0,0,3-3V10.5a2.977,2.977,0,0,0-.78-2,2.9768,2.9768,0,0,0,.78-2ZM6,4H9a1.0013,1.0013,0,0,1,1,1V6.5513A.9587.9587,0,0,1,9,7.5H6Zm4,8a1.0009,1.0009,0,0,1-1,1H6V9.5H9a1.0009,1.0009,0,0,1,1,1Z" transform="translate(0 0)"></path><polygon points="22 5 20 5 18 8.897 16 5 14 5 16.905 10 14 15 16 15 18 11.201 20 15 22 15 19.098 10 22 5"></polygon><circle cx="9" cy="27" r="1"></circle><rect x="2" y="18" width="4" height="2"></rect><rect x="8" y="18" width="4" height="2"></rect><rect x="14" y="18" width="4" height="2"></rect><rect x="20" y="18" width="4" height="2"></rect><rect x="26" y="18" width="4" height="2"></rect><path d="M26,31H6a2.0021,2.0021,0,0,1-2-2V25a2.0021,2.0021,0,0,1,2-2H26a2.0021,2.0021,0,0,1,2,2v4A2.0021,2.0021,0,0,1,26,31ZM6,25v4H26V25Z" transform="translate(0 0)"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
