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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><path d="M27,28V16H19V28H15V12H7V28H4V2H2V28a2,2,0,0,0,2,2H30V28ZM13,28H9V14h4Zm12,0H21V18h4Z"></path><path d="M22.7856,14a1.9877,1.9877,0,0,1-1.1787-.3865L11.2041,5.987,8.2419,10,6.6374,8.8065l2.9812-4a1.9978,1.9978,0,0,1,2.749-.446l10.4214,7.64,3.6045-4.8613L28,8.3306l-3.6045,4.8611A2.0014,2.0014,0,0,1,22.7856,14Z"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
