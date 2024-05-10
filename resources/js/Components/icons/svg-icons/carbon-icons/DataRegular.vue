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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><path d="m27,24c-.4622,0-.8948.1133-1.2859.2998l-4.8289-4.8291c.699-.981,1.1147-2.1768,1.1147-3.4707,0-3.3086-2.6917-6-6-6-1.2937,0-2.4897.416-3.4709,1.1147l-4.8289-4.8286c.1865-.3911.2998-.8237.2998-1.2861,0-1.6567-1.3433-3-3-3s-3,1.3433-3,3,1.3433,3,3,3c.4622,0,.8948-.1133,1.2859-.2998l4.8289,4.8291c-.699.981-1.1147,2.1768-1.1147,3.4707,0,3.3086,2.6917,6,6,6,1.2937,0,2.4897-.416,3.4709-1.1147l4.8289,4.8286c-.1865.3911-.2998.8237-.2998,1.2861,0,1.6567,1.3433,3,3,3s3-1.3433,3-3-1.3433-3-3-3Zm-11-4c-2.2056,0-4-1.7944-4-4s1.7944-4,4-4,4,1.7944,4,4-1.7944,4-4,4Z"></path><rect id="_Transparent_Rectangle_" data-name="&amp;lt;Transparent Rectangle&amp;gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
