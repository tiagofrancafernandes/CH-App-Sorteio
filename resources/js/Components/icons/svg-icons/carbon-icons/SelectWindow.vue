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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><path d="M8,26H4a2.0021,2.0021,0,0,1-2-2V20H4v4H8Z"></path><rect x="2" y="12" width="2" height="4"></rect><path d="M26,8H24V4H20V2h4a2.0021,2.0021,0,0,1,2,2Z"></path><rect x="12" y="2" width="4" height="2"></rect><path d="M4,8H2V4A2.0021,2.0021,0,0,1,4,2H8V4H4Z"></path><path d="M27,32a.9967.9967,0,0,1-.707-.293l-6.1377-6.1377L16.832,30.5547a1,1,0,0,1-1.79-.2676l-6-20A1,1,0,0,1,10.2871,9.042l20,6a1,1,0,0,1,.2676,1.79l-4.9854,3.3233L31.707,26.293a.9994.9994,0,0,1,0,1.414l-4,4A.9967.9967,0,0,1,27,32Zm0-2.4141L29.5859,27,22.431,19.845l5.2458-3.4978L11.4917,11.4917l4.8555,16.1851L19.845,22.431Z"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
