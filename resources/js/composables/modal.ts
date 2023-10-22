// useModal.js
import { ref } from 'vue';

export default () => {
    const isTheInfoModalVisible = ref<boolean>(false);

    const showModalInfo = (): void => {
        isTheInfoModalVisible.value = true;
    }

    const closeModalInfo = (pathname: string | null = null): void => {
        isTheInfoModalVisible.value = false;
        if (pathname) {
            window.location.pathname = pathname
        }
    }

    return {
        isTheInfoModalVisible,
        showModalInfo,
        closeModalInfo,
    };
}
