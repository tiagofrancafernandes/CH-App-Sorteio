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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><path d="M8,18.6V17H6v1.6A7.3833,7.3833,0,0,0,13.4,26H15V24H13.4A5.3775,5.3775,0,0,1,8,18.6Z" transform="translate(0 0)"></path><path d="M28,18H20a2.0059,2.0059,0,0,0-2,2v8a2.0059,2.0059,0,0,0,2,2h8a2.0059,2.0059,0,0,0,2-2V20A2.0059,2.0059,0,0,0,28,18ZM20,28V20h8v8Z" transform="translate(0 0)"></path><path d="M24,13.4V15h2V13.4A7.3833,7.3833,0,0,0,18.6,6H17V8h1.6A5.3775,5.3775,0,0,1,24,13.4Z" transform="translate(0 0)"></path><path d="M12,2H4A2.0059,2.0059,0,0,0,2,4v8a2.0059,2.0059,0,0,0,2,2h8a2.0059,2.0059,0,0,0,2-2V4A2.0059,2.0059,0,0,0,12,2ZM4,12V4h8v8Z" transform="translate(0 0)"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
