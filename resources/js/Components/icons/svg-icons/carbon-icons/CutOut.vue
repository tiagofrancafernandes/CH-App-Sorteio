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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><path d="M19.05,13.7326,18.05,12,7.928,17.8457,6.9312,17.27a2.9524,2.9524,0,0,0,.6672-.769A3,3,0,1,0,3.5,17.5986l2.428,1.4019L3.5,20.4023a3.0342,3.0342,0,1,0,3.4407.3223l.987-.5693L14.5914,24l1-1.7294-5.6634-3.27ZM4.0344,15.26a1,1,0,1,1,.4658.6069A.9929.9929,0,0,1,4.0344,15.26ZM4.9988,22a1,1,0,1,1-.8645,1.5A1,1,0,0,1,4.9988,22Z"></path><rect x="17" y="26" width="4" height="2"></rect><rect x="10" y="26" width="4" height="2"></rect><path d="M28,28H24V26h4V4H7V8H5V4A2.0023,2.0023,0,0,1,7,2H28a2.0023,2.0023,0,0,1,2,2V26A2.0023,2.0023,0,0,1,28,28Z"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
