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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><path d="M11.5,11A2.5,2.5,0,1,0,14,13.5,2.5,2.5,0,0,0,11.5,11Z" transform="translate(0 0)"></path><path d="M20.5,11A2.5,2.5,0,1,0,23,13.5,2.5,2.5,0,0,0,20.5,11Z" transform="translate(0 0)"></path><path d="M30,16A14,14,0,1,0,8.8994,28.042l.0156.1562A1.993,1.993,0,0,0,10.9048,30h10.19a1.9929,1.9929,0,0,0,1.99-1.8008l.0156-.1572A13.9674,13.9674,0,0,0,30,16ZM16,4A11.99,11.99,0,0,1,27.97,15.397L22.7637,18H9.2363L4.0305,15.397A11.99,11.99,0,0,1,16,4ZM4.12,17.6777l3.94,1.97.5813,5.81A11.97,11.97,0,0,1,4.12,17.6777ZM21.0947,28H10.9053l-.8-8h11.79Zm2.2644-2.542.5811-5.81,3.94-1.97A11.9712,11.9712,0,0,1,23.3591,25.458Z" transform="translate(0 0)"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
