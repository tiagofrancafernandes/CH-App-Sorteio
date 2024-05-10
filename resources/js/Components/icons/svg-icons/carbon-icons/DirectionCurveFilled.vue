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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><title>direction--curve--filled</title><path d="M28,2H4A2,2,0,0,0,2,4V28a2,2,0,0,0,2,2H28a2,2,0,0,0,2-2V4A2,2,0,0,0,28,2ZM22.5859,13.4141,18,8.8281v5.7686a5.0206,5.0206,0,0,1-1.0957,3.124l-2.2471,2.8086A3.01,3.01,0,0,0,14,22.4033V27H12V22.4033a5.0206,5.0206,0,0,1,1.0957-3.124l2.2471-2.8086A3.01,3.01,0,0,0,16,14.5967V8.8281l-4.5859,4.586L10,12l7-7,7,7Z"></path><path id="inner-path" class="cls-1" d="M22.5859,13.4141,18,8.8281v5.7686a5.0206,5.0206,0,0,1-1.0957,3.124l-2.2471,2.8086A3.01,3.01,0,0,0,14,22.4033V27H12V22.4033a5.0206,5.0206,0,0,1,1.0957-3.124l2.2471-2.8086A3.01,3.01,0,0,0,16,14.5967V8.8281l-4.5859,4.586L10,12l7-7,7,7Z" style="fill: none"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
