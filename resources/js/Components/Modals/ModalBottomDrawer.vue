<script setup>
import { get, set } from "radash";
import { useSlots, useAttrs, computed, ref, onMounted, onUnmounted } from 'vue';

import Button from './ModalTopButton.vue';

const props = defineProps({
    show: {
        type: Boolean,
        default: true,
    },
    showCloseButton: {
        type: Boolean,
        default: true,
    },
    collapsed: {
        type: Boolean,
        default: false,
    },
    maximized: {
        type: Boolean,
        default: false,
    },
    id: {
        type: String,
    },
    collapseHandle: {
        type: Function,
        default: (collapsed = null) => {
            console.log('collapsed', collapsed);
        },
    },
});

console.log('showCloseButton', props.showCloseButton);
console.log('collapsed', props.collapsed);
console.log('maximized', props.maximized);

const emit = defineEmits(['opening', 'opened', 'closing', 'closed'])

const slots = useSlots();
const attrs = useAttrs();

const showDrawer = computed(() => {
    let propsShow = props?.show ?? false;

    if (['false', '', 0, '0', '!true', 'no', false].includes(propsShow)) {
        return false;
    }

    return propsShow;
});

const showCloseButton = computed(() => {
    if (['false', '', 0, '0', '!true', 'no', false].includes(props?.showCloseButton ?? true)) {
        return false;
    }

    return true;
});

const drawerId = computed(() => {
    let genId = () => ('drawer_' + Math.random().toString().slice(2, 9));
    let _id = genId();
    let propsId = getOrSetStaticValues(
        'drawer_id',
        props?.id || attrs?.id || _id,
        _id
    ) || _id;

    return propsId;
});

const emitClosing = (event) => {
    emit('closing', {
        event,
        id: drawerId.value,
    })
}

const isFunction = (value) => {
    return value && typeof props.collapseHandle === 'function' ? true : false;
}

onMounted(() => {
    console.log('onMounted');
    collapsed.value = Boolean(props.collapsed);
    maximized.value = Boolean(props.maximized);
});

onUnmounted(() => {
    console.log('onUnmounted');

    isFunction(props.maximizeHandle) && props.maximizeHandle(false);
    isFunction(props.collapseHandle) && props.collapseHandle(false);
});

let collapsed = ref(false);
let maximized = ref(false);


const toggleCollapse = (event) => {
    collapsed.value = !collapsed.value;

    isFunction(props.collapseHandle) && props.collapseHandle(collapsed.value);
}

const toggleMaximized = (event) => {
    maximized.value = !maximized.value;

    isFunction(props.maximizeHandle) && props.maximizeHandle(maximized.value);
}

let positionToRight = ref(false);
const togglePosition = (event) => {
    positionToRight.value = !positionToRight.value;
}

let staticValues = ref({});

const getOrSetStaticValues = (key, valueOnNull) => {
    if (typeof key !== 'string' || !key.trim()) {
        return null;
    }

    key = key.trim();

    let value = get(staticValues.value, key);

    if (value === null) {
        set(staticValues.value, key, valueOnNull);
        return get(staticValues.value, key, valueOnNull);
    }

    return value;
}
</script>

<template>
<div
    v-show="showDrawer"
    :class="[
        'fixed',
        'bottom-0',
        'z-40',
        'p-4',
        'transition-transform',
        'bg-white',
        'dark:bg-gray-800',
        'transform-none',
        'border-t-[0.05rem]',
        'border-gray-500',
        {
            'w-1/12': collapsed,
            'h-18': collapsed,
            'w-full': !collapsed ,
            'right-0': collapsed && positionToRight,
            'left-0': collapsed && !positionToRight,
            'rounded-tr-lg': collapsed && !positionToRight,
            'rounded-tl-lg': collapsed && positionToRight,
            'border-r': collapsed && !positionToRight,
            'border-l': collapsed && positionToRight,
            'min-h-60': !collapsed,
            'h-custom-60': maximized,
        }
    ]"
    tabindex="-1"
    :aria-labelledby="`${drawerId}-label`"
    aria-modal="true" role="dialog"
    :style="[
        '--custom-height:' + (maximized ? '50rem' : '30rem'),
    ]"
>
    <button
        type="button"
        v-on:click="toggleMaximized"
        :class="[
            'absolute cursor-pointer inline-flex items-center justify-center text-xs font-bold border',
            'text-gray-50 bg-gray-500 hover:bg-gray-600 dark:bg-gray-700 dark:hover:bg-gray-800 border-white rounded-md dark:border-gray-500',
            'w-8 h-5 -top-2 -mt-0.5 start-4',
            {
                'hidden': collapsed,
            }
        ]"
    >
        <svg
            class="w-4 h-4 p-0"
            :class="{
                'rotate-180': !maximized,
            }"
            xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"
        >
            <path d="M6.00001 8C5.62123 8 5.27497 8.214 5.10558 8.55279C4.93619 8.89157 4.97274 9.29698 5.20001 9.6L11.2 17.6C11.3889 17.8518 11.6852 18 12 18C12.3148 18 12.6112 17.8518 12.8 17.6L18.8 9.6C19.0273 9.29698 19.0638 8.89157 18.8944 8.55279C18.725 8.214 18.3788 8 18 8H6.00001Z" fill="currentColor"></path>
        </svg>
    </button>

    <template
        v-if="slots.title"
    >
        <div
            :class="[
                {
                    'inline-flex': !collapsed,
                    'hidden': collapsed,
                    'overflow-hidden': collapsed,
                },
                'items-center mb-4 text-base font-semibold text-gray-500 dark:text-gray-400',
            ]"
        >
            <slot name="title"/>
        </div>
    </template>
    <template v-else>
        <h5
            :id="`${drawerId}-label`"
            class="inline-flex items-center mb-4 text-base font-semibold text-gray-500 dark:text-gray-400"
        >
        <svg class="w-4 h-4 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"></path>
        </svg>Bottom drawer</h5>
    </template>

    <div
        :class="[
            'absolute',
            'top-1',
            'end-1',
            'gap-x-1',
            'inline-flex',
            'bg-white',
            'dark:bg-gray-800',
        ]"
    >
        <Button
            @click.capture="togglePosition"
            label="Toggle Collapse"
            v-if="collapsed"
        >
            <svg
                :class="[
                    'w-5 h-5',
                    {
                        'rotate-180': positionToRight,
                    }
                ]"
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 24 24"
                fill="none"
                stroke="currentColor"
                stroke-width="2"
                stroke-linecap="round"
                stroke-linejoin="round"
            >
                <line x1="5" y1="12" x2="19" y2="12"></line>
                <polyline points="12 5 19 12 12 19"></polyline>
            </svg>
        </Button>

        <Button
            @click.capture="toggleCollapse"
            label="Toggle Collapse"
        >
            <svg
                :class="[
                    'w-5 h-5',
                    {
                        'rotate-90': !collapsed && positionToRight,
                        'rotate-180': !collapsed && !positionToRight,
                    }
                ]"
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 24 24"
                fill="none"
                stroke="currentColor"
                stroke-width="2"
                stroke-linecap="round"
                stroke-linejoin="round"
            >
                <line x1="7" y1="17" x2="17" y2="7"></line><polyline points="7 7 17 7 17 17"></polyline>
            </svg>
        </Button>

        <Button
            v-if="showCloseButton"
            @click.capture="emitClosing"
            label="Close menu"
            :class="{
                'hidden': collapsed,
            }"
        >
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"></path>
            </svg>
        </Button>
    </div>

    <slot name="header"></slot>
    <slot/>
    <slot name="footer"></slot>
</div>
</template>
