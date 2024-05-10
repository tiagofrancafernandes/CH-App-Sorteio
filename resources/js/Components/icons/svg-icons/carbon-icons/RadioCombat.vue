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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><path d="M10,26a4,4,0,1,1,4-4A4.0045,4.0045,0,0,1,10,26Zm0-6a2,2,0,1,0,2,2A2.0021,2.0021,0,0,0,10,20Z" transform="translate(0 0)"></path><rect x="17" y="20" width="9" height="2"></rect><rect x="17" y="24" width="9" height="2"></rect><path d="M20,12h8a2.0023,2.0023,0,0,0,2-2V6a2.0023,2.0023,0,0,0-2-2H20a2.0023,2.0023,0,0,0-2,2V7H12a4.0045,4.0045,0,0,0-4,4v3H6V4H4V14a2.0023,2.0023,0,0,0-2,2V28a2.0023,2.0023,0,0,0,2,2H28a2.0023,2.0023,0,0,0,2-2V16a2.0023,2.0023,0,0,0-2-2H10V11a2.0023,2.0023,0,0,1,2-2h6v1A2.0023,2.0023,0,0,0,20,12Zm4-6h4v4H24ZM20,6h2v4H20Zm8,22H4V16H28Z" transform="translate(0 0)"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
