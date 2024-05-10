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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><path d="M25,29c-1.6543,0-3-1.3458-3-3s1.3457-3,3-3,3,1.3458,3,3-1.3457,3-3,3Zm0-4c-.5515,0-1,.4486-1,1s.4485,1,1,1,1-.4486,1-1-.4485-1-1-1Z"></path><circle cx="20" cy="21" r="2"></circle><path d="M15,19c-1.6543,0-3-1.3458-3-3s1.3457-3,3-3,3,1.3458,3,3-1.3457,3-3,3Zm0-4c-.5515,0-1,.4486-1,1s.4485,1,1,1,1-.4486,1-1-.4485-1-1-1Z"></path><path d="M13,27H4c-1.104-.0013-1.9987-.896-2-2V5c.0013-1.104,.896-1.9987,2-2h7.5857c.5308-.0015,1.0401,.2095,1.4143,.5859l3.4143,3.4141h11.5857c1.104,.0013,1.9987,.896,2,2v7h-2v-7H15.5857l-4-4H4V25H13v2Z"></path><rect id="_Transparent_Rectangle_" data-name="&amp;lt;Transparent Rectangle&amp;gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
