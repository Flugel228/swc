// useModal.js
import { ref } from 'vue';
import router from "../router";

export default () => {
    const isTheInfoModalVisible = ref<boolean>(false);

    const showModalInfo = (): void => {
        isTheInfoModalVisible.value = true;
    }

    const closeModalInfo = (name: string | null = null): void => {
        isTheInfoModalVisible.value = false;
        if (name !== null) {
            router.push({name: name})
        }
    }

    return {
        isTheInfoModalVisible,
        showModalInfo,
        closeModalInfo,
    };
}
