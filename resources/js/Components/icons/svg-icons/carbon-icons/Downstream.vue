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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><path d="m5,24c-1.6567,0-3,1.3433-3,3s1.3433,3,3,3,3-1.3433,3-3-1.3433-3-3-3Zm0,4c-.5522,0-1-.4478-1-1s.4478-1,1-1,1,.4478,1,1-.4478,1-1,1Z"></path><path d="m16,24c-1.6567,0-3,1.3433-3,3s1.3433,3,3,3,3-1.3433,3-3-1.3433-3-3-3Zm0,4c-.5522,0-1-.4478-1-1s.4478-1,1-1,1,.4478,1,1-.4478,1-1,1Z"></path><path d="m27,24c-1.6567,0-3,1.3433-3,3s1.3433,3,3,3,3-1.3433,3-3-1.3433-3-3-3Zm0,4c-.5522,0-1-.4478-1-1s.4478-1,1-1,1,.4478,1,1-.4478,1-1,1Z"></path><path d="m29.586,17.5859l-1.5859,1.5859v-3.1719c0-3.5542-2.6646-6.4917-6.0999-6.9355.0623-.3457.0999-.7007.0999-1.0645,0-3.3135-2.6863-6-6-6s-6,2.6865-6,6c0,.3638.0376.7188.0999,1.0645-3.4353.4438-6.0999,3.3813-6.0999,6.9355v3.1714l-1.5859-1.5854-1.4141,1.4141,4,4,4-4-1.4141-1.4141-1.5859,1.5859v-3.1719c0-2.6953,2.1479-4.8848,4.8203-4.9819.8799,1.5063,2.3945,2.5918,4.1797,2.8921v5.2617l-1.5859-1.5859-1.4141,1.4141,4,4,4-4-1.4141-1.4141-1.5859,1.5859v-5.2617c1.7852-.3003,3.2998-1.3857,4.1797-2.8921,2.6724.0972,4.8203,2.2866,4.8203,4.9819v3.1714l-1.5859-1.5854-1.4141,1.4141,4,4,4-4-1.4141-1.4141Zm-13.5859-5.5859c-2.2056,0-4-1.7944-4-4s1.7944-4,4-4,4,1.7944,4,4-1.7944,4-4,4Z"></path><rect id="_Transparent_Rectangle_" data-name="&amp;lt;Transparent Rectangle&amp;gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
