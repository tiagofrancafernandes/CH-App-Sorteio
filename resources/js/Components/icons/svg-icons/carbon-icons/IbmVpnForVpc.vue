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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><path d="m29,23v-2c0-1.6499-1.3501-3-3-3s-3,1.3501-3,3v2c-1.1001,0-2,.8999-2,2v4c0,1.1001.8999,2,2,2h6c1.1001,0,2-.8999,2-2v-4c0-1.1001-.8999-2-2-2Zm-4-2c0-.5498.45-1,1-1s1,.4502,1,1v2h-2v-2Zm4,8h-6v-4h6v4Z"></path><path d="m7,22.14v-9.14h-2v9.14c-1.72.45-3,2-3,3.86,0,2.21,1.79,4,4,4,1.86,0,3.41-1.28,3.86-3h8.14v-2h-8.14c-.37-1.4-1.46-2.49-2.86-2.86Zm-1,5.86c-1.1,0-2-.9-2-2s.9-2,2-2,2,.9,2,2-.9,2-2,2Z"></path><path d="m30,6c0-2.21-1.79-4-4-4-1.86,0-3.41,1.28-3.86,3h-9.14v2h9.14c.37,1.4,1.46,2.49,2.86,2.86v5.14h2v-5.14c1.72-.45,3-2,3-3.86Zm-4,2c-1.1,0-2-.9-2-2s.9-2,2-2,2,.9,2,2-.9,2-2,2Z"></path><path d="m10,8.5898V2H2v8h6.5901l10.9958,11,1.4141-1.4141-11-10.9961Zm-2-.5898h-4v-4h4v4Z"></path><g id="_Transparent_Rectangle_" data-name="&amp;lt;Transparent Rectangle&amp;gt;"><rect class="cls-1" width="32" height="32" style="fill: none"></rect></g></svg>

</template>
