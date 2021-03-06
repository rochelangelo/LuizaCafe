import { create } from 'apisauce';

const api = create({
    baseURL: 'http://localhost/CafeLuiza/',
});

api.addResponseTransform(response => {
    if(!response.ok) throw response;
});

export default api;

