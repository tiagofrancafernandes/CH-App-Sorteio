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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><path d="m23.4141,22l-13.4141-13.4141V2H2v8h6.5859l13.4141,13.4141v6.5859h8v-8h-6.5859ZM8,8h-4V4h4v4Zm20,20h-4v-4h4v4Z"></path><path d="m30,6c0-2.2056-1.7944-4-4-4-1.8584,0-3.4106,1.2798-3.8579,3h-9.1421v2h9.1421c.3638,1.3989,1.4592,2.4941,2.8579,2.8579v9.1421h2v-9.1421c1.7202-.4473,3-1.9995,3-3.8579Zm-4,2c-1.103,0-2-.8975-2-2s.897-2,2-2,2,.8975,2,2-.897,2-2,2Z"></path><path d="m19,25h-9.1421c-.3638-1.3989-1.4592-2.4941-2.8579-2.8579v-9.1421h-2v9.1421c-1.7202.4473-3,1.9995-3,3.8579,0,2.2056,1.7944,4,4,4,1.8584,0,3.4106-1.2798,3.8579-3h9.1421v-2Zm-13,3c-1.103,0-2-.8975-2-2s.897-2,2-2,2,.8975,2,2-.897,2-2,2Z"></path><rect id="_Transparent_Rectangle_" data-name="&amp;lt;Transparent Rectangle&amp;gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
