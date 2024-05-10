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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><path d="M29.707,19.293l-3-3a.9994.9994,0,0,0-1.414,0L16,25.5859V30h4.4141l9.2929-9.293A.9994.9994,0,0,0,29.707,19.293ZM19.5859,28H18V26.4141l5-5L24.5859,23ZM26,21.5859,24.4141,20,26,18.4141,27.5859,20Z"></path><path d="M20,13V11H17.8579a3.94,3.94,0,0,0-.4248-1.019L18.95,8.4644,17.5356,7.05,16.019,8.5669A3.9443,3.9443,0,0,0,15,8.1421V6H13V8.1421a3.9443,3.9443,0,0,0-1.019.4248L10.4644,7.05,9.05,8.4644,10.5669,9.981A3.94,3.94,0,0,0,10.1421,11H8v2h2.1421a3.94,3.94,0,0,0,.4248,1.019L9.05,15.5356,10.4644,16.95l1.5166-1.5166A3.9443,3.9443,0,0,0,13,15.8579V18h2V15.8579a3.9443,3.9443,0,0,0,1.019-.4248L17.5356,16.95,18.95,15.5356,17.4331,14.019A3.94,3.94,0,0,0,17.8579,13Zm-6,1a2,2,0,1,1,2-2A2.0025,2.0025,0,0,1,14,14Z"></path><path d="M12,30H6a2.0021,2.0021,0,0,1-2-2V4A2.0021,2.0021,0,0,1,6,2H22a2.0021,2.0021,0,0,1,2,2V14H22V4H6V28h6Z"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
