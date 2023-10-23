import axios from "axios";

const api = axios.create()

api.interceptors.request.use(config => {
    const access_token = localStorage.getItem('access_token');
    if (access_token) {
        config.headers.Authorization = `Bearer ${access_token}`;
    }
    return config;
}, error => {
    return Promise.reject(error);
});


api.interceptors.response.use(config => {
    const access_token = localStorage.getItem('access_token');

    if (access_token) {
        config.headers.Authorization = `Bearer ${access_token}`
    }

    return config;
}, async error => {
    if (error.response.status === 401) {
        localStorage.removeItem('access_token')
    }
    return Promise.reject(error);
})

export default api
