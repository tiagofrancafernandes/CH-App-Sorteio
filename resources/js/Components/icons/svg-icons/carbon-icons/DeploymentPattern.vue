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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><path d="M8,20H4.73A1.9735,1.9735,0,0,0,3,19a2,2,0,0,0,0,4A1.9735,1.9735,0,0,0,4.73,22H8Z"></path><path d="M29,9a1.9735,1.9735,0,0,0-1.73,1H24v2h3.27A1.9991,1.9991,0,1,0,29,9Z"></path><path d="M25.4141,5,21,.5859,16.5859,5,20,8.4141V18h2V8.4141ZM21,3.4141,22.5859,5,21,6.5859,19.4141,5Z"></path><path d="M12,23.5859V14H10v9.5859L6.5859,27,11,31.4141,15.4141,27ZM9.4141,27,11,25.4141,12.5859,27,11,28.5859Z"></path><path d="M18,10H8.4141L5,6.5859.5859,11,5,15.4141,8.4141,12H18ZM5,12.5859,3.4141,11,5,9.4141,6.5859,11Z"></path><path d="M13,3A2,2,0,0,0,9,3,1.9733,1.9733,0,0,0,10,4.73V8h2V4.73A1.9733,1.9733,0,0,0,13,3Z"></path><path d="M22,27.2705V24H20v3.27a2,2,0,1,0,2,0Z"></path><path d="M31.4141,21,27,16.5859,23.5859,20H14v2h9.5859L27,25.4141ZM27,19.4141,28.5859,21,27,22.5859,25.4141,21Z"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
