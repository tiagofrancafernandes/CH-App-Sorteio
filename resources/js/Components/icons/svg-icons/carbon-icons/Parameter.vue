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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><path d="M28,13V8a2.0023,2.0023,0,0,0-2-2H23V8h3v5a3.9756,3.9756,0,0,0,1.3823,3A3.9756,3.9756,0,0,0,26,19v5H23v2h3a2.0023,2.0023,0,0,0,2-2V19a2.0023,2.0023,0,0,1,2-2V15A2.0023,2.0023,0,0,1,28,13Z"></path><path id="Combined-Shape" class="cls-1" d="M17,9l-.857,3h2L19,9h2l-.857,3H22v2H19.572l-1.143,4H21v2H17.857L17,23H15l.857-3h-2L13,23H11l.857-3H10V18h2.429l1.143-4H11V12h3.143L15,9Zm.572,5h-2l-1.143,4h2Z" style="fill-rule: evenodd"></path><path d="M6,13V8H9V6H6A2.0023,2.0023,0,0,0,4,8v5a2.0023,2.0023,0,0,1-2,2v2a2.0023,2.0023,0,0,1,2,2v5a2.0023,2.0023,0,0,0,2,2H9V24H6V19a3.9756,3.9756,0,0,0-1.3823-3A3.9756,3.9756,0,0,0,6,13Z"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-2" width="32" height="32" style="fill: none"></rect></svg>

</template>
