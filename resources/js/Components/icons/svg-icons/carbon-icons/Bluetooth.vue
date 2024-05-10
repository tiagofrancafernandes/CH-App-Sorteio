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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><title>bluetooth</title><path d="M16,30a1.06,1.06,0,0,1-.42-.09A1,1,0,0,1,15,29V18.41L8.41,25,7,23.59,14.59,16,7,8.41,8.41,7,15,13.59V3a1,1,0,0,1,.58-.91,1,1,0,0,1,1.07.15l7,6A1,1,0,0,1,24,9a1,1,0,0,1-.29.75L17.41,16l6.3,6.29A1,1,0,0,1,24,23a1,1,0,0,1-.35.72l-7,6A1,1,0,0,1,16,30Zm1-11.59v8.42l4.53-3.89ZM17,5.17v8.42l4.53-4.53Z"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill:none"></rect></svg>

</template>
