<script setup lang="js">
import { onClickOutside } from '@vueuse/core'
import { ref, watch, computed, nextTick } from 'vue'
import OpenedEyeIcon from '@/Components/icons/svg-icons/heroicons/OEye.vue'
import ClosedEyeIcon from '@/Components/icons/svg-icons/heroicons/OEyeSlash.vue'
import * as StringHelper from '@/Helpers/string/index';
import * as TypesHelper from '@/Helpers/types/index';
import { Link, useForm, usePage } from '@inertiajs/vue3';

// MODAL BEGIN
import PrimaryButton from '@/Components/PrimaryButton.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import Modal from '@/Components/Modal.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
// MODAL END

const user = usePage().props.auth.user;
const appUrls = usePage().props.urls || {};

const getUrl = (uri = '', type = 'web') => {
    type = typeof type === 'string' && (type in appUrls) ? type : 'web';

    let baseUrl = appUrls[type];

    return [
        baseUrl,
        uri,
    ]
    .map(item => StringHelper.trimSlashes(item)).join('/');
}

const props = defineProps({
    walletInfo: {
        type: Object,
        required: true,
    },
    keepOpenWalletList: {
        default: null,
    },
    activeWallet: {
        default: null,
    },
    parentHandler: {
        default: null,
    },
});
const emit = defineEmits(['selected']);

const walletItem = ref(null);
const showBalance = ref(false);
const keepOpenWalletList = ref(false);

const passwordInput = ref(null);

const balance = ref(props?.balance || null);
const wallet = ref(props?.walletInfo || {});
const walletId = computed(() => wallet.value?.uuid || wallet.value?.id);
const computedBalance = computed(() => balance.value || null);
const isActiveWallet = computed(() => {
    let activeWallet = props.parentHandler?.activeWallet?.get()?.value || props.activeWallet
    return activeWallet === walletId.value
});
const formatedBalance = computed(() => {
    return balance.value || StringHelper.limit('***********', 7, '');
});

onClickOutside(walletItem, () => {
    showBalance.value = false;
    balance.value = null;

    props?.keepOpenWalletList?.set(true);
})

const changeWalletRequest = (config = {}) => {
    config = config || {};
    config = typeof config === 'object' && Array.isArray(config) ? config : {};

    let params = {
        walletId: walletId.value,
    }

    if (!passwordInput.value) {
        console.error(`Password is required`);
        return;
    }

    let balanceUrl = route('api.wallet.change', params);

    if (!balanceUrl) {
        modalCloseAction();
        return;
    }

    let requestBody = {
        email: credentialsForm.email,
        intent: credentialsForm.intent,
        password: credentialsForm.password,
    };

    fetch(
        balanceUrl,
        {
            method: 'POST',
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(requestBody),
        }
    )
        ?.then(response => {
            if (!response || !response.ok) {
                console.log('Error: fail on change wallet');
                return null;
            }

            return response?.json();
        })
        ?.then(data => {
            if (!data || typeof data !== 'object' || data.success === undefined) {
                throw `Fail on change wallet`;
            }

            modalCloseAction();

            config?.onSuccess && config?.onSuccess(data);

            passwordInput.value = '';
        })
        ?.catch(error => {
            console.error(error);
            passwordInput.value = '';
            passwordInputFocus();
        });
};

const changeToThisWallet = () => {
    confirmUserCredentials({
        confirm: () => {
            console.log('antes do if');
            if (!isActiveWallet.value) {
                console.log('dentro do if');
                changeWalletRequest({
                    onSuccess: () => {
                        emit('selected', wallet);
                        if (props.parentHandler?.activeWallet?.get()?.value === walletId) {
                            return;
                        }
                        props.parentHandler?.activeWallet?.set(walletId);
                    },
                });
            }
            console.log('depois do if');
        },
    });
};

// ---- MODAL BEGIN
const showModalComponent = ref(false);
const passwordInputFocus = () => {
    if (!passwordInput?.value) {
        return;
    }

    passwordInput?.value?.focus();
};
const defaultModalActions = () => ({
    confirm: () => console.log('confirm'),
    cancel: () => console.log('cancel'),
    close: () => console.log('close'),
});

const modalActions = ref(defaultModalActions());

const setModalAction = (action, callable) => {
    console.log(action, callable);
    let _actions = modalActions.value || {};
    _actions[action] = callable;
    modalActions.value = _actions;
}

const modalConfirmAction = () => {
    try {
        modalActions.value?.confirm && modalActions.value?.confirm();
    } catch (error) {
        console.error(error);
    }
}

const modalCloseAction = () => {
    try {
        modalActions.value?.close && modalActions.value?.close();
    } catch (error) {
        console.error(error);
    }

    closeModal();
}

const showModal = (modalActionsConfig = {}) => {
    modalActionsConfig = modalActionsConfig || {};

    if ('confirm' in modalActionsConfig) {
        setModalAction('confirm', modalActionsConfig?.confirm);
    }

    if ('cancel' in modalActionsConfig) {
        setModalAction('cancel', modalActionsConfig?.cancel);
    }

    if ('close' in modalActionsConfig) {
        setModalAction('close', modalActionsConfig?.close);
    }

    showModalComponent.value = true;
}

const closeModal = () => {
    props?.keepOpenWalletList?.set(false);
    showModalComponent.value = false;

    // credentialsForm.reset();
    passwordInput.value = '';

    modalActions.value = defaultModalActions();
};

const confirmUserCredentials = (modalActionsConfig = {}) => {
    showModal(modalActionsConfig);

    nextTick(() => passwordInputFocus());
};

const credentialsForm = useForm({
    email: user.email,
    intent: 'balance',
    password: '',
});

const fetchBalanceData = () => {
    let params = {
        walletId: walletId.value,
    }

    if (!passwordInput.value) {
        console.error(`Password is required`);
        return;
    }

    // let loginUrl = route('api.auth.login');
    // let balanceUrl = getUrl(`/wallet/${walletId.value}/balance`, 'api');
    let balanceUrl = route('api.wallet.balance', params);

    if (!balanceUrl) {
        modalCloseAction();
        return;
    }

    let requestBody = {
        email: credentialsForm.email,
        intent: credentialsForm.intent,
        password: credentialsForm.password,
    };

    fetch(
        balanceUrl,
        {
            method: 'POST',
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(requestBody),
        }
    )
        ?.then(response => {
            if (!response || !response.ok) {
                balance.value = null;
                return null;
            }

            return response?.json();
        })
        ?.then(data => {
            if (!data || typeof data !== 'object' || data.balance === undefined) {
                throw `Fail on get balance`;
            }

            modalCloseAction();
            let dataBalance = parseFloat(data.balance);
            balance.value = !isNaN(dataBalance) ? dataBalance : null;

            if (balance.value && !showBalance.value) {
                showBalance.value = true;
            }

            passwordInput.value = '';
        })
        ?.catch(error => {
            // showBalance.value = false;
            console.error(error);
            passwordInput.value = '';
            passwordInputFocus();
            balance.value = null;
        });
};
// ---- MODAL END

const toggleShowBalance = () => {
    const cancelAction = () => {
        showBalance.value = false;
        balance.value = null;
        modalCloseAction();
    }

    confirmUserCredentials({
        confirm: () => {
            console.log('toggleShowBalance: showBalance.value', showBalance.value);

            if (TypesHelper.isFilled(balance.value)) {
                showBalance.value = false;
                balance.value = null;
                modalCloseAction();
                return;
            }
        },
        cancel: cancelAction,
        close: cancelAction,
    });
}
</script>

<template>
    <li
        ref="walletItem"
        class="grid grid-cols-5 gap-4 border-t border-stroke px-4.5 py-3 dark:border-strokedark"
        :class="{
            'hover:bg-gray-2 dark:hover:bg-meta-4': !isActiveWallet,
            // 'bg-gray-200 dark:bg-gray-900': isActiveWallet,
            'bg-primary bg-opacity-[0.5]': isActiveWallet,
            'isActiveWallet': isActiveWallet,
        }"
    >
        <div class="col-span-3">
                <div
                    class="flex flex-col gap-2.5"
                >
                    <div>
                        <PrimaryButton
                            v-show="!isActiveWallet"
                            size="sm"
                            @click="changeToThisWallet"
                        >Select</PrimaryButton>
                        <p v-show="isActiveWallet" class="font-bold text-xs min-h-1">[ACTIVE WALLET]</p>
                    </div>

                    <p class="text-sm flex flex-col gap-x-3">
                        <span
                            :title="wallet.title"
                        >
                            <span class="text-black dark:text-white">
                                {{ StringHelper.limit(wallet.title, 10, '...') }}
                            </span>
                            <span class="text-xs">{{ wallet.description ? ' | ' + StringHelper.limit(wallet.description, 15, '...') : '' }}</span>
                        </span>
                    </p>

                    <p class="text-xs">Info date: {{ wallet.lastUpdate }}</p>
                </div>
        </div>
        <div class="col-span-2 flex flex-col gap-2">
            <div class="flex items-start justify-between">
                <span class="font-bold">[{{ wallet.currency.code }}]</span>
            </div>
            <div class="flex items-center justify-between gap-3">
                <div
                    class="relative h-8.5 w-48 flex flex-grow items-center justify-between px-1 rounded-lg border-[0.5px] border-stroke bg-gray hover:text-primary dark:border-strokedark dark:bg-gray-500 dark:text-white"
                >
                    <span>{{ formatedBalance }}</span>
                    <button
                        type="button"
                        class="relative flex h-8.5 w-8.5 items-center justify-center rounded-full hover:text-primary dark:text-white"
                        @click.prevent="toggleShowBalance"
                        title="Show balance"
                    >
                        <OpenedEyeIcon
                            v-show="!computedBalance"
                            className="fill-current duration-300 ease-in-out"
                            width="18"
                            height="18"
                            size="sm"
                        />
                        <ClosedEyeIcon
                            v-show="computedBalance"
                            className="fill-current duration-300 ease-in-out"
                            width="18"
                            height="18"
                            size="sm"
                        />
                    </button>
                </div>
            </div>
        </div>

        <Modal :show="showModalComponent" @close="modalCloseAction">
            <div class="p-6">
                <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                    Auth
                </h2>

                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                    Please, confirm your password.
                </p>

                <div class="mt-6">
                    <InputLabel for="password" value="Password" class="sr-only" />

                    <TextInput
                        id="password"
                        ref="passwordInput"
                        v-model="credentialsForm.password"
                        type="password"
                        class="mt-1 block w-3/4"
                        placeholder="Password"
                        @keyup.enter="modalConfirmAction"
                    />

                    <InputError :message="credentialsForm.errors.password" class="mt-2" />
                </div>

                <div class="mt-6 flex justify-end">
                    <SecondaryButton @click="modalCloseAction"> Cancel </SecondaryButton>

                    <PrimaryButton
                        class="ms-3"
                        :class="{ 'opacity-25': credentialsForm.processing }"
                        :disabled="credentialsForm.processing"
                        @click="modalConfirmAction"
                    >
                        Confirm
                    </PrimaryButton>
                </div>
            </div>
        </Modal>
    </li>
</template>
