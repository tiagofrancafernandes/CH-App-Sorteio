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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><path d="M26,30h-7c-1.1028,0-2-.8972-2-2v-2h2v2h7v-7h-2v-2h2c1.1028,0,2,.8972,2,2v7c0,1.1028-.8972,2-2,2Z"></path><polygon points="12 24 14 24 13.9998 17.414 22.5823 26 24 24.5857 15.4139 15.9998 22 16 22 14 12 14 12 24"></polygon><path d="M8,27H4c-1.104-.0013-1.9987-.896-2-2V5c.0013-1.104,.896-1.9987,2-2h7.5857c.5308-.0015,1.0401,.2095,1.4143,.5859l3.4143,3.4141h11.5857c1.104,.0013,1.9987,.896,2,2v7h-2v-7H15.5857l-4-4H4V25h4v2Z"></path><rect id="_Transparent_Rectangle_" data-name="&amp;lt;Transparent Rectangle&amp;gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
