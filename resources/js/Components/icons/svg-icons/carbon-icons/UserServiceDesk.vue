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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><path d="M25.334,11.95l1.2055-1.206a1.178,1.178,0,0,1,1.2593-.2584l1.4693.5868A1.1736,1.1736,0,0,1,30,12.1489v2.692A1.1681,1.1681,0,0,1,28.8229,16l-.05-.0015C18.4775,15.3578,16.4,6.6357,16.0073,3.2976a1.1681,1.1681,0,0,1,1.0315-1.29A1.1492,1.1492,0,0,1,17.1751,2h2.5994a1.1626,1.1626,0,0,1,1.0764.7322l.5866,1.47a1.1635,1.1635,0,0,1-.2529,1.26L19.9791,6.668S20.6733,11.3682,25.334,11.95Z" transform="translate(0 0)"></path><path d="M16,30H14V25a3.0033,3.0033,0,0,0-3-3H7a3.0033,3.0033,0,0,0-3,3v5H2V25a5.0059,5.0059,0,0,1,5-5h4a5.0059,5.0059,0,0,1,5,5Z" transform="translate(0 0)"></path><path d="M9,10a3,3,0,1,1-3,3,3,3,0,0,1,3-3M9,8a5,5,0,1,0,5,5A5,5,0,0,0,9,8Z" transform="translate(0 0)"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
