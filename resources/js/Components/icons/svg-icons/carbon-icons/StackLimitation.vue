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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><rect x="8" y="22" width="8" height="8"></rect><path d="M24,12H20v2h4v2H21v2h3v2H20v2h4a2.0027,2.0027,0,0,0,2-2V14A2.0023,2.0023,0,0,0,24,12Z"></path><path d="M16,20H8V12h8Zm-6-2h4V14H10Z"></path><polygon points="16 3.41 14.59 2 12 4.59 9.41 2 8 3.41 10.59 6 8 8.59 9.41 10 12 7.41 14.59 10 16 8.59 13.41 6 16 3.41"></polygon><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
