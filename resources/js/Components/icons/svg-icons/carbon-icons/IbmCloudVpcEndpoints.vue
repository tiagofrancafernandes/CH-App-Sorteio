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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><path id="_Path_" data-name="&lt;Path&gt;" d="M20,27H7a2.0059,2.0059,0,0,1-2-2V12H7V25H20Z" transform="translate(0 0)"></path><path id="_Compound_Path_" data-name="&lt;Compound Path&gt;" d="M23.4,22l-4-4a3.6057,3.6057,0,0,0,.6-2,4.0118,4.0118,0,0,0-4-4,3.6057,3.6057,0,0,0-2,.6l-4-4V2H2v8H8.6l4,4a3.6057,3.6057,0,0,0-.6,2,4.0118,4.0118,0,0,0,4,4,3.6057,3.6057,0,0,0,2-.6l4,4V30h8V22ZM8,8H4V4H8Zm8,10a2,2,0,1,1,2-2A2.0059,2.0059,0,0,1,16,18ZM28,28H24V24h4Z" transform="translate(0 0)"></path><path id="_Path_2" data-name="&lt;Path&gt;" d="M25,20h2V7a2.0059,2.0059,0,0,0-2-2H12V7H25Z" transform="translate(0 0)"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
